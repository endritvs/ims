<?php

namespace App\Http\Controllers;

use App\Models\interviewee;
use App\Http\Requests\Store;
use App\Models\interview;
use Illuminate\Http\Request;
use App\Models\Interviewee_Type;
use App\Models\Interviewee_Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class IntervieweeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $intervieweesA = interviewee::with('interviewee_type')->orderBy('id', 'asc')->paginate(5);
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        $sql="SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id, ims_database.t.name";
        $exec=DB::select(DB::raw($sql));
    
        return view('intervieweesMainComponents/table')->with(['exec'=>$exec,'intervieweesA' => $intervieweesA, 'intervieweesT' => $intervieweesT]);
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
                'email' => ['required', 'string', 'max:40'],
                'cv_path' => ['required', 'mimes:pdf,docx,jpeg,png,jpg,jpj', 'max:2048'],
                'img' => ['required', 'mimes:jpeg,png,jpg,jpj', 'max:2048'],
            ]);
            interviewee::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'cv_path' => $file_path,
                'external_cv_path' => $request['external_cv_path'],
                'email' => $request['email'],
                'img' => $img_path,
                'interviewee_types_id' => $request['interviewee_types_id'],
          
            ]);
       
        }
        return  redirect()->route('interviewees.index');
    }


    public function edit($id)
    {

        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        $interviewees=interviewee::with('interviewee_type')->orderBy('id', 'asc')->get();
        $interviewees = interviewee::findOrFail($id);
        

        return view('intervieweesMainComponents/edit')->with(['interviewees' => $interviewees, 'intervieweesT' => $intervieweesT]);
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
                'cv_path' => ['required', 'mimes:pdf,docx,jpeg,png,jpg,jpj', 'max:2048'],
                'email' => ['required', 'string', 'max:40'],
                'img' => ['required', 'mimes:jpeg,png,jpg,jpj', 'max:2048'],
            ]);

            $interviewee->name = $request->name;
            $interviewee->surname = $request->surname;
            $interviewee->cv_path = $file_path;
            $interviewee->external_cv_path = $request->external_cv_path;
            $interviewee->email = $request->email;
            $interviewee->interviewee_types_id = $request->interviewee_types_id;
            $interviewee->img = $img_path;

            $interviewee->save();
        } else {
            $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'surname' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'interviewee_types_id' => ['required'],
                'email' => ['required', 'string', 'max:40'],

            ]);
            $interviewee->name = $request->name;
            $interviewee->surname = $request->surname;
            $interviewee->cv_path =  $interviewee->cv_path;
            $interviewee->external_cv_path = $request->external_cv_path;
            $interviewee->email = $request->email;
            $interviewee->interviewee_types_id = $request->interviewee_types_id;
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
        Storage::delete("storage/app/".$interviewee->cv_path);
        Storage::delete("storage/app/".$interviewee->img);
        $interviewee->delete();
        return back();
    }
}





