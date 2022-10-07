<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Interviewee_Type;
use App\Models\Interviewee_Attribute;
use App\Models\Companies;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
 
    public function create()
    {
        return view('auth.register');       
    }

    public function typeform(Request $request)
    {

        $img =  $request->hasFile('img');
       
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'company_name' => ['required', 'regex:/^[a-z A-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/ ', 'confirmed', Rules\Password::defaults()],
            'interview_type' => ['required', 'regex:/^[a-z A-Z]+$/u', 'string', 'max:25'],
            'interview_attribute' => ['required', 'regex:/^[a-z A-Z]+$/u', 'string', 'max:25'],
        ]);
     
        if ($img) {
            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/img');
            $company = Companies::create([
                'company_name'=>$request['company_name']
            ]);
            $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'img' => $img_path,
            'company_id'=> $company['id']
        ]); 

        $interview_type = Interviewee_Type::create([
           'name' => $request['interview_type'],
        ]);


        $interview_attribute = Interviewee_Attribute::create([

            'name' => $request['interview_attribute'],
            'interviewee_type_id' => $interview_type['id'],
        ]);


        event(new Registered($user));

         Auth::login($user);

    }else{
        $company = Companies::create([
            'company_name'=>$request['company_name']

        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img'=>"public/noProfilePhoto/nofoto.jpg",
            'company_id'=>$company['id']
        ]);

        $interview_type = Interviewee_Type::create([
           'name' => $request['interview_type'],
        ]);

        $interview_attribute = Interviewee_Attribute::create([

            'name' => $request['interview_attribute'],
            'interviewee_type_id' => $interview_type['id'],
        ]);

        event(new Registered($user));

        Auth::login($user);
    }
 

        return redirect(RouteServiceProvider::HOME);
        
    }

    public function store(Request $request)
    {  
         $img =  $request->hasFile('img');
         $CompanyImg =  $request->hasFile('image');
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'surname' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'company_name' => ['required', 'regex:/^[a-z A-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/ ', 'confirmed', Rules\Password::defaults()],
        ]);
     
        if ($img && $CompanyImg) {
            $newImg = $request->file('img');
            $img_path = $newImg->store('/public/img');
            $newImgCompany = $request->file('image');
            $company_img_path = $newImgCompany->store('/public/img');

            $company = Companies::create([
                'company_name'=>$request['company_name'],
                'image'=>$company_img_path
            ]);
            $user = User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'img' => $img_path,
            'company_id'=>$company['id']
        ]); 
      
        event(new Registered($user));

         Auth::login($user);
    }else{
        $company = Companies::create([
            'company_name'=>$request['company_name'],
            'image'=>'public/noProfilePhoto/nofoto.jpg'
        ]);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img'=>"public/noProfilePhoto/nofoto.jpg",
            'company_id'=>$company['id']
        ]);

        event(new Registered($user));

        Auth::login($user);
    }
 

        return redirect(RouteServiceProvider::HOME);
    }
}