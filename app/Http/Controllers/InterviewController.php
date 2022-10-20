<?php

namespace App\Http\Controllers;

use App\Models\interview;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Models\review;
use App\Models\interviewee;
use App\Models\comment;
use App\Models\Interviewee_Type;
use App\Models\reviews_attributes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AcceptMail;
use App\Mail\InterviewMail;
use App\Traits\ZoomMeetingTrait;
  
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
        $review = review::with('candidates', 'questionnaires', 'interviews')->where('company_id', Auth::user()->company_id)->where('questionnaire_id',Auth::user()->id)->get();
        $review = $review->toArray();
      
        date_default_timezone_set("Europe/Belgrade");
        $today = date("Y-m-d H:i:s");

        $interview = interview::with('user', 'interviewees', 'review')->where('company_id', Auth::user()->company_id)->where('interview_date', '>=', $today)->where('interviewer', Auth::user()->id)->orderBy('interview_date', 'asc')->paginate(15);
        $interviewAll = interview::with('user', 'interviewees')->where('company_id', Auth::user()->company_id)->where('interview_date', '>=', $today)->orderBy('interview_date', 'asc')->get();
        
        $interviewAll = $interviewAll ->groupBy ('interview_id') -> toArray();
        $interviewAll = $this->paginateDash($interviewAll);
        
        $pastInterview = interview::with('user', 'interviewees', 'review')->where('company_id', Auth::user()->company_id)->where('interview_date', '<', $today)->where('interviewer', Auth::user()->id)->orderBy('interview_date', 'asc')->paginate(5);
        $pastInterviewAll = interview::with('user', 'interviewees', 'review')->where('company_id', Auth::user()->company_id)->where('interview_date', '<', $today)->orderBy('interview_date', 'asc')->paginate(5);

        foreach ($interviewAll as $a => $i) {
            if (count($i) > 1) {
                $names = "";
                $icons = "";
                $id = "";
                foreach ($i as $x) {

                    $iconLink = explode("/", $x['user']['img']);

                    $names .= $x['user']['name'] . " " . $x['user']['surname']. ",";
                    $icons .= $iconLink[2] . " || ";
                    $id .= $x['user']['id'] . ",";

                }
                
                $test = $i;

                array_splice($test, 0, -1);

                $test[0]['user']['name'] = $names;
                $test[0]['user']['img'] = $icons;
                $test[0]['user']['id'] = $id;
                
                $interviewAll[$a] = $test;
            }
        }

        $sql="SELECT candidate_id,AVG(rating_amount) as rating FROM reviews GROUP BY candidate_id";
        
        $exec = DB::select(DB::raw($sql));
       
        return view('pages/dashboard', compact('interview'),compact('review'))->with(['interviewAll' => $interviewAll, 'exec' => $exec, 'pastInterview' => $pastInterview, 'pastInterviewAll' => $pastInterviewAll]);
    }

    public function sort(){
        $comment = comment::with('candidates', 'questionnaires')->where('company_id', Auth::user()->company_id)->get();
        $interview=interview::select('interviews.*')
        ->join('interviewees', 'interviews.interviewees_id', '=', 'interviewees.id')
        ->where('interviews.company_id', Auth::user()->company_id)
        ->orderBy('interviewees.name')
        ->paginate(6);
        // SELECT * FROM interviews JOIN interviewees
        //  ON interviews.interviewees_id = interviewees.id ORDER BY interviewees.name;
        $sql="SELECT candidate_id,AVG(rating_amount) as rating FROM reviews GROUP BY candidate_id";
        $exec = DB::select(DB::raw($sql));
        $review_attributes = reviews_attributes::with('candidates', 'questionnaires', 'interviews', 'attributes')->where('company_id', Auth::user()->company_id)->get();
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->where('company_id', Auth::user()->company_id)->get();
        return view('interviewComponents/public_table')->with(['interview'=>$interview,"intervieweesT"=>$intervieweesT,"review_attributes"=>$review_attributes,'exec'=>$exec,'comment'=>$comment]);
    }

    public function sortDate(){
        $comment = comment::with('candidates', 'questionnaires')->where('company_id', Auth::user()->company_id)->get();
        $interview=interview::orderBy('interview_date','asc')
        ->where('interviews.company_id', Auth::user()->company_id)
        ->paginate(6);
        $sql="SELECT candidate_id,AVG(rating_amount) as rating FROM reviews GROUP BY candidate_id";
        $exec = DB::select(DB::raw($sql));
        
        $review_attributes = reviews_attributes::with('candidates', 'questionnaires', 'interviews', 'attributes')->where('company_id', Auth::user()->company_id)->get();
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->where('company_id', Auth::user()->company_id)->get();
        return view('interviewComponents/public_table')->with(['interview'=>$interview,"intervieweesT"=>$intervieweesT,"review_attributes"=>$review_attributes,'exec'=>$exec,'comment'=>$comment]);
    }

    public function sortRating(){
        $comment = comment::with('candidates', 'questionnaires')->where('company_id', Auth::user()->company_id)->get();
        $interview=interview::select('interviews.*')
        ->join('reviews', 'interviews.interview_id', '=', 'reviews.id') 
        ->where('interviews.company_id', Auth::user()->company_id)
        ->orderBy('reviews.rating_amount','desc')
        ->paginate(6);
        $sql="SELECT candidate_id,AVG(rating_amount) as rating FROM reviews GROUP BY candidate_id";
        $exec = DB::select(DB::raw($sql));
        
$review_attributes = reviews_attributes::with('candidates', 'questionnaires', 'interviews', 'attributes')->where('company_id', Auth::user()->company_id)->get();
$intervieweesT = Interviewee_Type::orderBy('id', 'desc')->where('company_id', Auth::user()->company_id)->get();
        return view('interviewComponents/public_table')->with(['interview'=>$interview,"intervieweesT"=>$intervieweesT,"review_attributes"=>$review_attributes,'exec'=>$exec,'comment'=>$comment]);
    }


    public function public_index(Request $request)
    {  

        $review_attributes = reviews_attributes::with('candidates', 'questionnaires', 'interviews', 'attributes')->where('company_id', Auth::user()->company_id)->get();

        $comment = comment::with('candidates', 'questionnaires')->where('company_id', Auth::user()->company_id)->get();
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->where('company_id', Auth::user()->company_id)->get();
        $interview= interview::with('user', 'interviewees')->where('company_id', Auth::user()->company_id)->get();
        $searchString=$request->term;
        $interview = interview::whereHas('interviewees', function ($query) use ($searchString){
            $query->where(DB::raw('CONCAT(name," ",surname)'), 'LIKE', '%' . $searchString . '%')->where('company_id', Auth::user()->company_id);
        })
        ->with(['interviewees' => function($query) use ($searchString){
            $query->where(DB::raw('CONCAT(name," ",surname)'), 'LIKE', '%' . $searchString . '%')
            ->orWhere(DB::raw('CONCAT(name," ",surname)'), 'LIKE', '%' . $searchString . '%')->where('company_id', Auth::user()->company_id);
        }])->with('user')
        ->get();
//   dd($categories);
        $interview = $interview->groupBy('interview_id')->toArray();
            
        foreach ($interview as $a => $i) {
            if (count($i) > 1) {
                $names = "";
                $id = "";
                foreach ($i as $x) {
                    $names .= $x['user']['name'] . ",";
                    $id .= $x['user']['id'] . ",";

                }
                
                $test = $i;

                array_splice($test, 0, -1);

                $test[0]['user']['name'] = $names;
                $test[0]['user']['id'] = $id;
                
                $interview[$a] = $test;
            }
        }

        $interview = collect($interview)->flatten(1)->toArray();
        $interview = $this->paginate($interview);
        $interview->withPath('/interview');
        $sql="SELECT candidate_id,AVG(rating_amount) as rating FROM reviews GROUP BY candidate_id";
        
        $exec = DB::select(DB::raw($sql));
  
        return view('interviewComponents/public_table', compact('interview'),compact('exec'))->with('comment', $comment,'i',(request()->input('page',1)-1)*5)->with(['intervieweesT'=>$intervieweesT, 'review_attributes' => $review_attributes]);
    }
    public function index()
    {
        $admin = User::orderBy('id', 'desc')->where('company_id', Auth::user()->company_id)->where('role', 'interviewer')->get();
        $interviewee = interviewee::orderBy('id', 'desc')->where('company_id', Auth::user()->company_id)->get();
        $sql = "SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id,ims_database.t.name";
        $exec = DB::select(DB::raw($sql));

        $interviewss = interview::with('user', 'interviewees')->orderBy('interview_id', 'asc')->where('company_id', Auth::user()->company_id)->get();
        $interview = interview::with('user', 'interviewees')->orderBy('interview_id', 'asc')->where('company_id', Auth::user()->company_id)->paginate(5);

        return view('interviewComponents/table')->with(['exec' => $exec, 'interview' => $interview, 'admin' => $admin, 'interviewee' => $interviewee, 'interviewss' => $interviewss]);
    }



    public function paginate($items, $perPage = 6, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function paginateDash($items, $perPage = 15, $page = null, $options = [])
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

        $request->validate([
                'interview_id' => ['required'],
                'interviewer' => ['required'],
                'interview_date' => ['required', 'after:yesterday'],
                'interviewees_id' => ['required'],
        ]);

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
                'interviewees_id' => $request['interviewees_id'],
                'company_id' => Auth::user()->company_id,
            ]);
        }

        $interview = interview::with('user', 'interviewees')->where('interview_id', $request['interview_id'])->get();

        $id = '8574484059';
              
        $meeting = $this->get($id);


        $data = [

           'topic'              => $interview[0]->interviewees->interviewee_type->name,                 // Interview Type
           'start_time'         => $request['interview_date'],                                          // Interview Date
           'duration'           => 60,
           'host_video'         => 0,
           'participant_video'  => 0
        ];

        $info = $this -> create($data);

        $meetingId = $info['data']['id'];

        $interview[0]->startLink = $info['data']['start_url'];  // Interviewer Link (Multiple hosts)
        $interview[0]->joinLink = $info['data']['join_url'];    // Interviewee Link 

        $interview[0]->save();

        foreach ($interview as $a) {

            $interviewerNames[$index++] = $a->user->name;
        }

        foreach ($interviewer as $i) {
            foreach ($interview as $a) {

             if ($i == $a->user->id) {
                $mail_data = [

                        'recipient' => $a->user->email,
                        'link' => $interview[0]->startLink,
                        'interviewType' => $a->interviewees->interviewee_type->name,
                        'interviewer' => implode(", ", $interviewerNames),
                        'intervieweeName' => $a->interviewees->name." ".$a->interviewees->surname,
                        'interview_date' => $a->interview_date,
                        'linkForReview'=>'review/candidate/'.$a->interviewees->id.'/?id='.$a->id,
                        'fromEmail' => 'imsinfoteam@gmail.com',
                        'fromName' => 'IMS Company'
                    ];

                Mail::to($mail_data['recipient'])
                    ->queue(new InterviewMail($mail_data));
            }
        }}

        $mail_data['recipient'] = $interview[0]->interviewees->email;
        $mail_data['link'] = $interview[0]->joinLink;

        Mail::to($mail_data['recipient'])
            ->queue(new InterviewMail($mail_data));

        return back()->with(['admin' => $admin]);
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
            'interviewees_id' => ['required'],
            'interview_date' => ['required', 'after:yesterday'],
        ]);

        $interview->interviewer = $request->interviewer;
        $interview->interviewees_id = $request->interviewees_id;
        $interview->interview_date = $request->interview_date;


        $interview->save();

        return redirect()->route('interview.index');
    }

    public function destroyComment($id)
    {
        $comment = comment::findOrFail($id);
        $comment->delete();
        return back();
    }

    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);
        $interview->delete();
        return back();
    }

    public function accept($id)
    {

        $interview = Interview::with('interviewees')->findOrFail($id);

        $mail_data = [

            'recipient' => $interview->interviewees->email,
            'interviewType' => $interview->interviewees->interviewee_type->name,
            'intervieweeName' => $interview->interviewees->name." ".$interview->interviewees->surname,
            'fromEmail' => 'imsinfoteam@gmail.com',
            'fromName' => 'IMS Company'
        ];

        Mail::to($mail_data['recipient'])
            ->queue(new AcceptMail($mail_data));

        $interview->status = "accepted";
        $interview->save();

        return back();
    }

    public function decline($id)
    {

        $interview = Interview::with('interviewees')->findOrFail($id);

        $mail_data = [

            'recipient' => $interview->interviewees->email,
            'interviewType' => $interview->interviewees->interviewee_type->name,
            'intervieweeName' => $interview->interviewees->name." ".$interview->interviewees->surname,
            'fromEmail' => 'imsinfoteam@gmail.com',
            'fromName' => 'IMS Company'
        ];

            Mail::to($mail_data['recipient'])
            ->queue(new AcceptMail($mail_data));

        $interview->status = 'declined';
        $interview->save();

        return back();
    }
}
