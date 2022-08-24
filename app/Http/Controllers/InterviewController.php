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


class InterviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        $admin = User::orderBy('id', 'desc')->where('role', 'admin')->get();


        $interviewer = $request['interviewer'];

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

        return  redirect()->route('interview.index')->with(['admin' => $admin]);
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

    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);
        $interview->delete();
        return back();
    }
}
