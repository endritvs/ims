<?php

namespace App\Http\Controllers;

use App\Models\interview;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Traits\ZoomMeetingTrait;
use App\Models\interviewee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Log;

class InterviewController extends Controller 
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 0;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function __construct()
    {
        $this->middleware('auth');
        $this->client = new Client();
        $this->jwt = $this->generateZoomToken();
        $this->headers = [
            'Authorization' => 'Bearer '.$this->jwt,
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ];        
    }

    public function index1()
    {
        $interview = interview::with('user', 'interviewees')->where('interviewer', Auth::user()->id)->orderBy('interview_date', 'asc')->paginate(5);
        return view('pages/newPage', compact('interview'));
    }
    public function public_index()
    {
        $interview = interview::with('user', 'interviewees')->orderBy('interview_date', 'asc')->get();
        $interview = $interview->groupBy('interview_id')->toArray();
        foreach ($interview as $a => $i) {
            if (count($i) > 1) {
                $names = "";
                foreach ($i as $x) {
                    $names .= $x['user']['name'] . ",";
                }
                $test = $i;
                array_splice($test, 0, -1);
                $test[0]['user']['name'] = $names;
                $interview[$a] = $test;
            }
        }
        $interview = collect($interview)->flatten(1)->toArray();
        $interview = $this->paginate($interview);
        $interview->withPath('/interview/public');
        return view('interviewComponents/public_table', compact('interview'));
    }
    public function index()
    {

        $admin = User::orderBy('id', 'desc')->where('role', 'interviewer')->get();
        $interviewee = interviewee::orderBy('id', 'desc')->get();
        $sql = "SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id, ims_database.t.name";
        $exec = DB::select(DB::raw($sql));

        $interviewss = interview::with('user', 'interviewees')->orderBy('interview_id', 'asc')->get();
        $interview = interview::with('user', 'interviewees')->orderBy('interview_id', 'asc')->paginate(5);


        return view('interviewComponents/table')->with(['exec' => $exec, 'interview' => $interview, 'admin' => $admin, 'interviewee' => $interviewee, 'interviewss' => $interviewss]);
    }



    public function paginate($items, $perPage = 7, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    

    public function store(Request $request)
    {

        $admin = User::orderBy('id', 'desc')->where('role', 'interviewer')->get();
        $interviewer = $request['interviewer'];
        $interviewee = interviewee::orderBy('id', 'desc')->where('id', $request['interviewees_id'])->get();
        $index = 0;

        // dd($interview[1]->interviewees->name." ".$interview[1]->interviewees->surname);        Interviewee Name
        // dd($interview[1]->user->name);                                                         Interviewer Name
        // dd($interview[1]->interviewees->interviewee_type->name);                               Interviewee Type

        for ($i = 0; $i < count($interviewer); $i++) {


            $request->validate([
                'interview_id' => ['required'],
                'interviewer' => ['required'],
                'interview_date' => ['required', 'after:yesterday'],
                'interviewees_id' => ['required'],
            ]);
            Interview::create([
                'interview_id' => $request['interview_id'],
                'interviewer' => $interviewer[$i],
                'interview_date' => $request['interview_date'],
                'interviewees_id' => $request['interviewees_id']

            ]);

        } 


        $interview = interview::with('user', 'interviewees')->where('interview_id', $request['interview_id'])->get();

        $id = 6944987743;
        $meeting = $this->get($id);

        $data = [

           'topic'              => $interview[0]->interviewees->interviewee_type->name,                 // Interview Type
           'start_time'         => $request['interview_date'],                                          // Interview Date
           'duration'           => 60,
           'host_video'         => 0,
           'participant_video'  => 0
        ];

        $info = $this -> create($data);

                                           // Ndreqet nese e rujm ne databaze, veq po pritoj me bo migrations ngl
                                           // $meetingId = $info['data']['id']; <-- Me rujt
                                           // Me qeta ndreqet edhe edit btw
                                           // Problemi o tani qe me edit/delete te ni interview row, te tjerat rrijn njejt
                                           // Duhet mu bo opcioni me mass update/mass delete te public interview table

        $meetingId = $info['data']['id'];

        // dd($info['data']);                                // Meeting Data
        $startLink = $info['data']['start_url'];             // Interviewer Link (Multiple hosts)
        $joinLink  = $info['data']['join_url'];              // Interviewee Link 

        foreach ($interview as $a) {
            $interviewerNames[$index++] = $a->user->name;
        }

        foreach ($interviewer as $i) {
            foreach ($interview as $a) {

             if ($i == $a->user->id) {
                $mail_data = [

                        'recipient' => $a->user->email,
                        'link' => $startLink,
                        'interviewType' => $a->interviewees->interviewee_type->name,
                        'interviewer' => implode(", ", $interviewerNames),
                        'intervieweeName' => $a->interviewees->name." ".$a->interviewees->surname,

                        'fromEmail' => 'dionkelmendi@gmail.com',
                        'fromName' => 'IMS Company'
                    ];

                \Mail::send('/interviewComponents/emailTemplate', $mail_data, function($message) use ($mail_data){
                
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject("prova");

                }); 
            }
        }}
        
        $mail_data['recipient'] = $interview[0]->interviewees->email;
        $mail_data['link'] = $joinLink;

        \Mail::send('/interviewComponents/emailTemplate', $mail_data, function($message) use ($mail_data){
                
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject("prova");
        }); 

        return redirect()->route('interview.index')->with(['admin' => $admin]);
    }

    public function edit($id)
    {
        $admin = User::orderBy('id', 'desc')->where('role', 'interviewer')->get();
        $interviewee = interviewee::orderBy('id', 'desc')->get();
        $interview = interview::with('user', 'interviewees')->orderBy('interview_id', 'asc')->get();
        $interview = Interview::findOrFail($id);

        return view('interviewComponents/edit')->with([ 'interview' => $interview,'interviewee' => $interviewee,'admin' => $admin]);
    }
    public function update(Request $request, $id)
    {
        $interview = Interview::findOrFail($id);

        $request->validate([
            'interviewer' => ['required'],
            'interview_date' => ['required', 'after:yesterday'],
        ]);

        $interview->interviewer = $request->interviewer;
        $interview->interview_date = $request->interview_date;


        $interview->save();

        return redirect()->route('interview.index');
    }

    public function destroy($id)
    {
       
        $interview = Interview::findOrFail($id);
        $interview->delete();
        
        return back();
    }
}
