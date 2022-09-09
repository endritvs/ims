<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\Storeinterviewee_typesRequest;
use App\Http\Requests\Updateinterviewee_typesRequest;

use App\Models\Interviewee_Type;





class IntervieweeTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {  
        // dd("ardit");
        $interviewees = Interviewee_Type::orderBy('id', 'asc')->paginate(5);
      
        return view('intervieweeAttributes/table')->with('interviewees', $interviewees);
    }


    public function create()

    {
        return view('intervieweeComponents/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'regex:/^[a-z A-Z]+$/u', 'string', 'max:25'],
        ]);
        Interviewee_Type::create([
            'name' => $request['name'],
        ]);
        return redirect('/interviewee-attributes');
    }


    public function show($id)
    {

        $interviewee = Interviewee_Type::find($id);
        return view('admin.userposts.show', compact('interviewee'));
    }


    public function edit($id)
    {
        $interviewee = Interviewee_Type::findOrFail($id);

        return view('intervieweeComponents/edit')->with(['interviewee' => $interviewee]);
    }


    public function update(Request $request, $id)
    {
        $interviewee = Interviewee_Type::findOrFail($id);
        $request->validate([
            'name' => ['required', 'regex:/^[a-z A-Z]+$/u', 'string', 'max:25'],
        ]);
        $interviewee->name = $request->name;



        $interviewee->save();

        return redirect('/interviewee-attributes');
    }


    public function destroy($id)
    {
        $interviewee = Interviewee_Type::findOrFail($id);

        $interviewee->delete();
        return  back();
    }
}