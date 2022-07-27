<?php

namespace App\Http\Controllers;

use App\Models\interviewee_types;
use App\Http\Requests\Storeinterviewee_typesRequest;
use App\Http\Requests\Updateinterviewee_typesRequest;

class IntervieweeTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviewees = interviewee_types::orderBy('id', 'desc')->get();

        return view('intervieweeComponents/intervieweeTable')->with('interviewees', $interviewees);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
        {
            return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeinterviewee_typesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeinterviewee_typesRequest $request)
    {
        interviewee_types::create([
            'name' => $data['name'],
        ]);
        return  redirect()->route('pages.index');
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\interviewee_types  $interviewee_types
     * @return \Illuminate\Http\Response
     */
    public function show(interviewee_types $interviewee_types)
    {
        
            $interviewee = interviewee_types::find($id);
            return view('admin.userposts.show', compact('interviewee'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\interviewee_types  $interviewee_types
     * @return \Illuminate\Http\Response
     */
    public function edit(interviewee_types $interviewee_types)
    {
        $interviewee = interviewee_types::findOrFail($id);

        return view('interviewee-edit')->with(['interviewee' => $interviewee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateinterviewee_typesRequest  $request
     * @param  \App\Models\interviewee_types  $interviewee_types
     * @return \Illuminate\Http\Response
     */
    public function update(Updateinterviewee_typesRequest $request, interviewee_types $interviewee_types)
    {
        $interviewee = interviewee_types::findOrFail($id);

        $interviewee->name = $request->name;
       
        

        $interviewee->save();

        return redirect('admin/users')->with("statusE", "User updated successfully!");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\interviewee_types  $interviewee_types
     * @return \Illuminate\Http\Response
     */
    public function destroy(interviewee_types $interviewee_types)
    {
        $interviewee = interviewee_types::findOrFail($id);
       
        $interviewee->delete();
        return  back();
    }
}
