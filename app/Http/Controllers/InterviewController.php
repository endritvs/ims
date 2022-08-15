<?php

namespace App\Http\Controllers;

use App\Models\interview;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\StoreinterviewRequest;
use App\Http\Requests\UpdateinterviewRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admin = User::orderBy('id', 'desc')->where('role', 'admin')->get();
        $default_user = User::orderBy('id', 'desc')->where('role', 'interviewee')->get();
        $interview = interview::with('user', 'users')->orderBy('interview_date', 'asc')->paginate(5);

        return view('interviewComponents/table')->with(['interview' => $interview, 'admin' => $admin, 'default_user' => $default_user]);
    }

    public function public_index()
    {
        $interview = interview::with('user', 'users')->orderBy('interview_date', 'asc')->get();

        $interviews_query = "SELECT interview_name, 
        GROUP_CONCAT( interviewer ) as 'Interviewer' , interviewee, interview_date 
        FROM interviews group by interview_name, interviewee, interview_date;";


        $interviews_concat = DB::select(DB::raw($interviews_query));

        $data = $this->paginate($interviews_concat);

        $data->withPath('/interview/public');

        return view('interviewComponents/public_table', compact('data'), compact('interview'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function create()

    {
        $admin = User::orderBy('id', 'desc')->where('role', 'admin')->get();
        $default_user = User::orderBy('id', 'desc')->where('role', 'interviewee')->get();

        $interview = Interview::orderBy('id', 'desc')->get();
        return view('interviewComponents/create')->with(['admin' => $admin, 'default_user' => $default_user, 'interview' => $interview]);
    }

    public function store(Request $request)
    {

        $admin = User::orderBy('id', 'desc')->where('role', 'admin')->get();
        $default_user = User::orderBy('id', 'desc')->where('role', 'interviewee')->get();

        $interviewer = $request['interviewer'];

        for ($i = 0; $i < count($interviewer); $i++) {

            $request->validate([
                'interview_name' => ['required'],
                'interviewer' => ['required'],
                'interviewee' => ['required'],
                'interview_date' => ['required', 'after:yesterday'],
            ]);
            Interview::create([
                'interview_name' => $request['interview_name'],
                'interviewer' => $interviewer[$i],
                'interviewee' => $request['interviewee'],
                'interview_date' => $request['interview_date'],
            ]);
        }
        return  redirect()->route('interview.index')->with(['admin' => $admin, 'default_user' => $default_user]);
    }
    public function show($id)
    {

        $interviewee = Interview::find($id);
        return view('admin.userposts.show', compact('interviewee'));
    }
    public function edit($id)
    {
        $admin = User::orderBy('id', 'desc')->where('role', 'admin')->get();
        $default_user = User::orderBy('id', 'desc')->where('role', 'interviewee')->get();
        $user = User::orderBy('id', 'desc')->get();
        $interview = Interview::findOrFail($id);

        return view('interviewComponents/edit')->with(['admin' => $admin, 'default_user' => $default_user, 'interview' => $interview, 'user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $interview = Interview::findOrFail($id);

        $request->validate([
            'interviewer' => ['required'],
            'interviewee' => ['required'],
            'interview_date' => ['required', 'after:yesterday'],

        ]);

        $interview->interviewer = $request->interviewer;
        $interview->interviewee = $request->interviewee;
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