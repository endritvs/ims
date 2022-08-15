<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interviewee_Attribute;
use App\Models\Interviewee_Type;


class Interviewee_AttributesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $intervieweesA = Interviewee_Attribute::with('interviewee_type')->orderBy('id', 'asc')->paginate(5);
        // $intervieweesT = interviewee_type::with('interviewee_type')->orderBy('id', 'asc')->get();
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        return view('intervieweeAttributesComponents/table')->with(['intervieweesA' => $intervieweesA, 'intervieweesT' => $intervieweesT]);
    }

    public function create()

    {
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        return view('intervieweeAttributesComponents/create')->with(['intervieweesT' => $intervieweesT]);
    }

    public function store(Request $request)
    {

        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();

        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'interviewee_types_id' => ['required'],
        ]);
        Interviewee_Attribute::create([
            'name' => $request['name'],
            'interviewee_types_id' => $request['interviewee_types_id']
        ]);
        return  redirect()->route('intervieweeAttributes.index')->with(['intervieweesT' => $intervieweesT]);
    }
    public function show($id)
    {

        $interviewee = Interviewee_Attribute::find($id);
        return view('admin.userposts.show', compact('interviewee'));
    }
    public function edit($id)
    {
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        $interviewee = Interviewee_Attribute::findOrFail($id);

        return view('intervieweeAttributesComponents/edit')->with(['interviewee' => $interviewee, 'intervieweesT' => $intervieweesT]);
    }
    public function update(Request $request, $id)
    {
        $interviewee = Interviewee_Attribute::findOrFail($id);
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'interviewee_types_id' => ['required'],
        ]);
        $interviewee->name = $request->name;
        $interviewee->interviewee_types_id = $request->interviewee_types_id;
        $interviewee->save();

        return redirect('interviewee-attributes');
    }
    public function destroy($id)
    {
        $interviewee = Interviewee_Attribute::findOrFail($id);

        $interviewee->delete();
        return back();
    }
}