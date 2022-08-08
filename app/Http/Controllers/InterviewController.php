<?php

namespace App\Http\Controllers;

use App\Models\interview;
use Illuminate\Http\Request;
use App\Http\Requests\StoreinterviewRequest;
use App\Http\Requests\UpdateinterviewRequest;
use App\Models\User;

class InterviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $interview = interview::with('user', 'users')->orderBy('interview_date', 'asc')->paginate(5);
        return view('interviewComponents/table')->with(['interview' => $interview]);
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

        $request->validate([
            'interviewer' => ['required'],
            'interviewee' => ['required'],
            'interview_date' => ['required', 'after:yesterday'],
        ]);
        Interview::create([
            'interviewer' => $request['interviewer'],
            'interviewee' => $request['interviewee'],
            'interview_date' => $request['interview_date'],
        ]);
        return  redirect()->route('interview.index')->with(['admin' => $admin, 'default_user' => $default_user]);

    }
    public function show($id)
    {

        $interviewee = Interviewee::find($id);
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
