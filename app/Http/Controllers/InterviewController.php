<?php

namespace App\Http\Controllers;

use App\Models\interview;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Models\interviewee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Interviewee_Type;
use App\Models\Interviewee_Attribute;

class InterviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index1()
    {
        $interview = interview::with('user', 'interviewees')->where('interviewer', Auth::user()->id)->orderBy('interview_date', 'asc')->paginate(5);

        $userID = Auth::user()->id;
     
        $interviews_query = "SELECT interview_id, 
        GROUP_CONCAT( interviewer ) as 'Interviewer' ,interviewees_id, interview_date 
        FROM interviews WHERE interviewer=$userID group by interview_id,interviewer,interviewees_id, interview_date";
  $sql="SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id";
  $exec=DB::select(DB::raw($sql));

        $interviews_concat = DB::select(DB::raw($interviews_query));

        $data = $this->paginate($interviews_concat);

        $data->withPath('/dashboard');

        return view('pages/newPage', compact('data'), compact('interview'))->with(['exec'=>$exec]);
    }
    public function public_index()
    {
       
        $interview = interview::with('user','interviewees')->orderBy('interview_date', 'asc')->paginate(10);
        // $interview = interview::with('user')->orderBy('interview_date', 'asc')->get();
        $interviewee = interviewee::orderBy('id', 'desc')->get();
        $interviews_query = "SELECT interview_id, 
        GROUP_CONCAT( interviewer ) as 'interviewer' ,interviewees_id, interview_date 
        FROM interviews group by interview_id,interviewees_id, interview_date;";
          
          
        $sql="SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id";
        $exec=DB::select(DB::raw($sql));


        
        $interviews_concat = DB::select(DB::raw($interviews_query));


        $data = $this->paginate($interviews_concat);

        $data->withPath('/interview/public');
    //    dd($interview);
        return view('interviewComponents/public_table', compact('data') ,compact('interview'))->with(['exec'=>$exec,'interviewee'=>$interviewee]);
        
    }
    public function index()
    {
        $admin = User::orderBy('id', 'desc')->where('role', 'interviewer')->get();
        $interviewee = interviewee::orderBy('id', 'desc')->get();
        $query="SELECT interview_id FROM interviews ORDER BY interview_id DESC LIMIT 1";
        $interviews_concat = DB::select(DB::raw($query));
        $sql="SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id";
        $exec=DB::select(DB::raw($sql));
        
    //    dd($interviews_concat);
        // $interview = interview::with('user', 'users', 'interviewee_types', 'interviewee_attributes')->orderBy('interview_date', 'asc')->paginate(5);
        $interview = interview::with('user','interviewees')->orderBy('interview_date', 'asc')->paginate(7);
        // dd($interview);
        return view('interviewComponents/table')->with(['exec'=>$exec,'interviews_concat'=>$interviews_concat,'interview' => $interview, 'admin' => $admin, 'interviewee' => $interviewee]);
    }



    public function paginate($items, $perPage = 7, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function create()

    {
        $admin = User::orderBy('id', 'desc')->where('role', 'interviewer')->get();
        $default_user = User::orderBy('id', 'desc')->where('role', 'interviewee')->get();

        $interview = Interview::orderBy('id', 'desc')->get();
        return view('interviewComponents/create')->with(['admin' => $admin, 'default_user' => $default_user, 'interview' => $interview]);
    }

    public function store(Request $request)
    {

        $admin = User::orderBy('id', 'desc')->where('role', 'admin')->get();


        $interviewer = $request['interviewer'];
 
        for ($i = 0; $i < count($interviewer); $i++) {

            $request->validate([
                'interview_id' => ['required'],
                // 'interview_id' => ['required'],
                'interviewer' => ['required'],
                'interview_date' => ['required', 'after:yesterday'],
                'interviewees_id' => ['required'],
            ]);
            Interview::create([
                'interview_id' => $request['interview_id'],
                // 'interview_id' => $request['interview_id'],
                'interviewer' => $interviewer[$i],
                'interview_date' => $request['interview_date'],
                'interviewees_id'=>$request['interviewees_id']
            ]);
        }

        return  redirect()->route('interview.index')->with(['admin' => $admin]);
    }
    public function show($id)
    {

        $interviewee = Interview::find($id);
        return view('admin.userposts.show', compact('interviewee'));
    }
    public function edit($id)
    {
        $admin = User::orderBy('id', 'desc')->where('role', 'admin')->get();
        $user = User::orderBy('id', 'desc')->get();
        $interviewee = interviewee::orderBy('id', 'desc')->get();
        $interview = Interview::findOrFail($id);

        return view('interviewComponents/edit')->with(['admin' => $admin,'interviewee' => $interviewee, 'interview' => $interview, 'user' => $user]);
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

    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);

        $interview->delete();
        return back();
    }
}