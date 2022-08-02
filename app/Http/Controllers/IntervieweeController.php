<?php

namespace App\Http\Controllers;

use App\Models\interviewee;
use App\Http\Requests\Store;
use Illuminate\Http\Request;
use App\Models\Interviewee_Type;
use Illuminate\Support\Facades\Storage;

class IntervieweeController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $intervieweesA = interviewee::with('interviewee_type')->orderBy('id', 'asc')->paginate(5);
            return view('intervieweesMainComponents/table')->with(['intervieweesA' => $intervieweesA]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        return view('intervieweesMainComponents/create')->with(['intervieweesT' => $intervieweesT]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreintervieweeRequest  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {
        $file = $request->hasFile('cv_path');
        $img =  $request->hasFile('img');
        if ($file && $img) {

            $newFile = $request->file('cv_path');
            $file_path = $newFile->store('/public/cv_path');

            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/images');

            interviewee::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'cv_path' => $file_path,
                'external_cv_path'=>$request['external_cv_path'],
                'img' => $img_path,
                'interviewee_types_id' => $request['interviewee_types_id'],
            ]);

            
        }
        return  redirect()->route('interviewees.index');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\interviewee  $interviewee
     * @return \Illuminate\Http\Response
     */
    public function show(interviewee $interviewee)
    {
        $interviewee = interviewee::find($id);
        return view('admin.userposts.show', compact('interviewee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\interviewee  $interviewee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$interviewee = interviewee::orderBy('id', 'desc')->get();
        //$intervieweesT = Interviewee_Type::findOrFail($id);
       
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        $interviewees = interviewee::findOrFail($id);

        return view('intervieweesMainComponents/edit')->with(['interviewees' => $interviewees, 'intervieweesT' => $intervieweesT]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateintervieweeRequest  $request
     * @param  \App\Models\interviewee  $interviewee
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
        $file = $request->hasFile('cv_path');
        $img =  $request->hasFile('img');

        $interviewee = Interviewee::findOrFail($id);

        if ($file && $img) {

            $newFile = $request->file('cv_path');
            $file_path = $newFile->store('/public/cv_path');

            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/images');

        
        $interviewee->name = $request->name;
        $interviewee->surname = $request->surname;
        $interviewee->cv_path = $file_path;
        $interviewee->external_cv_path = $request->external_cv_path;
        $interviewee->interviewee_types_id = $request -> interviewee_types_id;
        $interviewee->img = $img_path;

        $interviewee->save();
        
        }

        
        return redirect('interviewees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\interviewee  $interviewee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interviewee = interviewee::findOrFail($id);
        Storage::delete($interviewee->cv_path);
        Storage::delete($interviewee->img);
        $interviewee->delete();
        return back();
    }
}
