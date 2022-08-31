<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class interviewer extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $interviewer = User::orderBy('id', 'asc')->paginate(5);
        return view('interviewerComponents/table')->with(['interviewer' => $interviewer]);
    }

    public function create()
    {
        $interviewer = User::orderBy('id', 'desc')->get();
        return view('interviewerComponents/create')->with(['interviewer' => $interviewer]);
    }

    public function store(Request $request)
    {
     
          $img =  $request->hasFile('img');
 
 
            if ($img) {
                $newImg = $request->file('img');
                $img_path = $newImg->store('/public/img');
                $request->validate([
                    'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                    'email' => ['required', 'string', 'max:40'],
                    'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$.%^&*-]).{8,}$/ ', 'string', 'max:25'],
                    'role' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                    'img' => ['required', 'mimes:jpeg,png,jpg,jpj', 'max:2048'],
                ]);
             User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'img' => $img_path,
            ]); 
        }else{
            $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'email' => ['required', 'string', 'max:40'],
                'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$.%^&*-]).{8,}$/ ', 'string', 'max:25'],
                'role' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
               
            ]);
            User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'img'=>"public/noProfilePhoto/nofoto.jpg"
                    ]);
        }
    
    
        return  redirect()->route('interviewer.index');
    }




    public function edit($id)
    {
        $interviewer = User::findOrFail($id);

        return view('interviewerComponents/edit')->with(['interviewer' => $interviewer]);
    }


    public function update(Request $request, $id)
    {
 
        $img =  $request->hasFile('img');
        $interviewer = User::findOrFail($id);
        if ($img) {
            
            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/img');
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:40'],
            'role' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'img' => ['required', 'mimes:jpeg,png,jpg,jpj', 'max:2048'],
        ]);
        $interviewer->name = $request->name;
        $interviewer->email = $request->email;
        $interviewer->role = $request->role;
        $interviewer->img = $img_path;
        
        $interviewer->save();

        return redirect()->route('interviewer.index');
    }else{
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:40'],
            'role' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
         
        ]);
        $interviewer->name = $request->name;
        $interviewer->email = $request->email;
        $interviewer->role = $request->role;
        $interviewer->img = $interviewer->img;
        $interviewer->save();
        return redirect()->route('interviewer.index');
    }
    }

    public function editProfile($id)
    {
        $interviewer = User::findOrFail($id);

        return view('profile/profile')->with(['interviewer' => $interviewer]);
    }



    public function updateProfile(Request $request, $id)
    {
        $img =  $request->hasFile('img');
        $interviewer = User::findOrFail($id);

        if ($img) {
            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/img');
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:40'],
            'img' => ['required', 'mimes:jpeg,png,jpg,jpj', 'max:2048'],
        ]);
        $interviewer->name = $request->name;
        $interviewer->email = $request->email;
        $interviewer->img = $img_path;
        $interviewer->save();
        return back();

        }else{
            $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
                'email' => ['required', 'string', 'max:40'],
            ]);
            $interviewer->name = $request->name;
            $interviewer->email = $request->email;
            $interviewer->save();
            return back();
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$.%^&*-]).{8,}$/ '],
        ]);
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }
        if($request->new_password!==$request->new_password_confirmation){
            return back()->with("error", "Confirm Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function destroy($id)
    {
        $interviewer = User::findOrFail($id);
        Storage::delete($interviewer->img);
        Storage::delete("storage/app/".$interviewer->img);
        $interviewer->delete();
        return  back();
    }
}