<?php

namespace App\Http\Controllers;

use App\Models\interviewee;
use App\Http\Requests\Store;
use Illuminate\Http\Request;
use App\Models\Interviewee_Type;
use App\Models\Interviewee_Attribute;
use Illuminate\Support\Facades\Storage;

class IntervieweeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $intervieweesA = interviewee::with('interviewee_type', 'interviewee_attribute')->orderBy('id', 'asc')->paginate(5);
        $intervieweesAt = Interviewee_Attribute::orderBy('id', 'desc')->get();
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        return view('intervieweesMainComponents/table')->with(['intervieweesA' => $intervieweesA, 'intervieweesAt' => $intervieweesAt, 'intervieweesT' => $intervieweesT]);
    }


    public function create()
    {
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        $intervieweesA = Interviewee_Attribute::orderBy('id', 'desc')->get();
        return view('intervieweesMainComponents/create')->with(['intervieweesT' => $intervieweesT, 'intervieweesA' => $intervieweesA]);
    }



    public function store(Request $request)
    {

        $file = $request->hasFile('cv_path');
        $img =  $request->hasFile('img');
        if ($file && $img) {

            $newFile = $request->file('cv_path');
            $file_path = $newFile->store('/public/cv_path');

            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/images');
            $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'surname' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'interviewee_types_id' => ['required'],
                'interviewee_attributes_id' => ['required'],
                'cv_path' => ['required', 'mimes:pdf,docx,jpeg,png,jpg,jpj', 'max:2048'],
                'img' => ['required', 'mimes:jpeg,png,jpg,jpj', 'max:2048'],
            ]);
            interviewee::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'cv_path' => $file_path,
                'external_cv_path' => $request['external_cv_path'],
                'img' => $img_path,
                'interviewee_types_id' => $request['interviewee_types_id'],
                'interviewee_attributes_id' => $request['interviewee_attributes_id'],
            ]);
        }
        return  redirect()->route('interviewees.index');
    }


    public function show(interviewee $id)
    {
        $interviewee = interviewee::find($id);
        return view('admin.userposts.show', compact('interviewee'));
    }

    public function edit($id)
    {

        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        $intervieweesA = Interviewee_Attribute::orderBy('id', 'desc')->get();
        $interviewees = interviewee::findOrFail($id);

        return view('intervieweesMainComponents/edit')->with(['interviewees' => $interviewees, 'intervieweesT' => $intervieweesT, 'intervieweesA' => $intervieweesA]);
    }


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
            $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'surname' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'interviewee_types_id' => ['required'],
                'interviewee_attributes_id' => ['required'],
                'cv_path' => ['required', 'mimes:pdf,docx,jpeg,png,jpg,jpj', 'max:2048'],
                'img' => ['required', 'mimes:jpeg,png,jpg,jpj', 'max:2048'],
            ]);

            $interviewee->name = $request->name;
            $interviewee->surname = $request->surname;
            $interviewee->cv_path = $file_path;
            $interviewee->external_cv_path = $request->external_cv_path;
            $interviewee->interviewee_types_id = $request->interviewee_types_id;
            $interviewee->interviewee_attributes_id = $request->interviewee_attributes_id;
            $interviewee->img = $img_path;

            $interviewee->save();
        } else {
            $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'surname' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'interviewee_types_id' => ['required'],
                'interviewee_attributes_id' => ['required'],

            ]);
            $interviewee->name = $request->name;
            $interviewee->surname = $request->surname;
            $interviewee->cv_path =  $interviewee->cv_path;
            $interviewee->external_cv_path = $request->external_cv_path;
            $interviewee->interviewee_types_id = $request->interviewee_types_id;
            $interviewee->interviewee_attributes_id = $request->interviewee_attributes_id;
            $interviewee->img = $interviewee->img;

            $interviewee->save();
        }

        return redirect('interviewees');
    }


    public function destroy($id)
    {
        $interviewee = interviewee::findOrFail($id);
        Storage::delete($interviewee->cv_path);
        Storage::delete($interviewee->img);
        $interviewee->delete();
        return back();
    }
}