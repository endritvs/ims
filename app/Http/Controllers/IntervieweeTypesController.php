<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\Storeinterviewee_typesRequest;
use App\Http\Requests\Updateinterviewee_typesRequest;

use App\Models\Interviewee_Type;





class IntervieweeTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviewees = Interviewee_Type::orderBy('id', 'asc')->paginate(5);
        return view('intervieweeComponents/table')->with('interviewees', $interviewees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        return view('intervieweeComponents/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeinterviewee_typesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Interviewee_Type::create([
            'name' => $request['name'],
        ]);
        return  redirect()->route('interviewee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\interviewee_types  $interviewee_types
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $interviewee = Interviewee_Type::find($id);
        return view('admin.userposts.show', compact('interviewee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\interviewee_types  $interviewee_types
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interviewee = Interviewee_Type::findOrFail($id);

        return view('intervieweeComponents/edit')->with(['interviewee' => $interviewee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateinterviewee_typesRequest  $request
     * @param  \App\Models\interviewee_types  $interviewee_types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $interviewee = Interviewee_Type::findOrFail($id);

        $interviewee->name = $request->name;



        $interviewee->save();

        return redirect('interviewee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\interviewee_types  $interviewee_types
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interviewee = Interviewee_Type::findOrFail($id);

        $interviewee->delete();
        return  back();
    }
}