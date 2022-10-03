<?php

namespace App\Http\Controllers;

use App\Models\interviewee;
use App\Http\Requests\Store;
use App\Models\interview;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Interviewee_Type;
use App\Models\Interviewee_Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\reviews_attributes;
use Illuminate\Support\Facades\Auth;

class IntervieweeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        $interviewss = interview::with('user', 'interviewees')->orderBy('interview_id', 'asc')->where('company_id', Auth::user()->company_id)->get();
        $interviewer = user::where('role', 'interviewer')->orderBy('id', 'asc')->where('company_id', Auth::user()->company_id)->get();
        $review_attributes = reviews_attributes::with('candidates', 'questionnaires', 'interviews', 'attributes')->where('company_id', Auth::user()->company_id)->get();
        $intervieweesA = interviewee::with('interviewee_type')->where('company_id', Auth::user()->company_id)->where([
            ['name', '!=' , Null],
            ['surname', '!=' , Null],
            ['interviewee_types_id', '!=' , Null],
            [function ($query) use ($request){
                if(($term=$request->term)){
                    $query->where('name', 'LIKE', '%'.$term.'%')
                    ->orWhere(DB::raw('CONCAT(name," ",surname)'), 'LIKE', '%' . $term . '%');
                }
            
                if(($termT=$request->termT)){
                    $query->orWhere('interviewee_types_id','LIKE','%'.$termT.'%');
                }
                
            }]
        ])
        ->orderBy('id', 'asc')->get();
        $intervieweesA = $this->paginate($intervieweesA);
        $intervieweesA->withPath('/interviewees');
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->where('company_id', Auth::user()->company_id)->get();

        $sql="SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id, ims_database.t.name";
        $exec=DB::select(DB::raw($sql));

        $sql1="SELECT candidate_id,AVG(rating_amount) as rating FROM reviews GROUP BY candidate_id";
        $exec1 = DB::select(DB::raw($sql1));

        return view('intervieweesMainComponents/table')->with(['exec'=>$exec,'exec1'=>$exec1,'intervieweesA' => $intervieweesA, 'intervieweesT' => $intervieweesT, 'review_attributes' => $review_attributes, 'interviewss' => $interviewss, 'interviewer' => $interviewer]);
    }

    public function sortByName(){
        $interviewss = interview::with('user', 'interviewees')->orderBy('interview_id', 'asc')->get();
        $intervieweesA= interviewee::with('interviewee_type')->where('company_id',Auth::user()->company_id)->orderBy('name','asc')->paginate(6);
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        $interviewer = user::where('role', 'interviewer')->orderBy('id', 'asc')->get();
        $sql="SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id, ims_database.t.name";
        $exec=DB::select(DB::raw($sql));
        $review_attributes = reviews_attributes::with('candidates', 'questionnaires', 'interviews', 'attributes')->get();

        $sql1="SELECT candidate_id,AVG(rating_amount) as rating FROM reviews GROUP BY candidate_id";
        $exec1 = DB::select(DB::raw($sql1));
        return view('intervieweesMainComponents/table')->with(['interviewer'=>$interviewer,'interviewss'=>$interviewss,'review_attributes'=>$review_attributes,'exec'=>$exec,'exec1'=>$exec1,'intervieweesA'=>$intervieweesA,'intervieweesT'=>$intervieweesT]);
    }

 
    public function paginate($items, $perPage = 6, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
                'status'=>'pending',
                'interviewee_types_id' => $request['interviewee_types_id'],
                'company_id' => Auth::user()->company_id,
          
            ]);
       
        }
        return redirect()->route('interviewees.index');
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

    public function accept($id)
    {

        $interviewee = interviewee::findOrFail($id);

        $mail_data = [

            'recipient' => $interviewee->email,
            'interviewType' => $interviewee->interviewee_type->name,
            'intervieweeName' => $interviewee->name." ".$interviewee->surname,
            'fromEmail' => 'imsinfoteam@gmail.com',
            'fromName' => 'IMS Company'
        ];

            \Mail::send('/interviewComponents/acceptEmail', $mail_data, function($message) use ($mail_data){

            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject("Interview Info - You have been accepted!");

        }); 

        $interviewee->status = "accepted";
        $interviewee->save();

        return back();
    }

    public function decline($id)
    {

        $interviewee = interviewee::findOrFail($id);

        $mail_data = [

            'recipient' => $interviewee->email,
            'interviewType' => $interviewee->interviewee_type->name,
            'intervieweeName' => $interviewee->name." ".$interviewee->surname,
            'fromEmail' => 'imsinfoteam@gmail.com',
            'fromName' => 'IMS Company'
        ];

            \Mail::send('/interviewComponents/declineEmail', $mail_data, function($message) use ($mail_data){

            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject("Interview Info - You have been declined");

        }); 

        $interviewee->status = 'declined';
        $interviewee->save();

        return back();
    }
}





