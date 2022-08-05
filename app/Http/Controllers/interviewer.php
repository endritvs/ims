<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:25'],
            'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/ ', 'string', 'max:25'],
            'role' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],

        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        return  redirect()->route('interviewer.index');
    }

    public function show($id)
    {

        $interviewer = User::find($id);
        return view('admin.userposts.show', compact('interviewer'));
    }


    public function edit($id)
    {
        $interviewer = User::findOrFail($id);

        return view('interviewerComponents/edit')->with(['interviewer' => $interviewer]);
    }


    public function update(Request $request, $id)
    {
        $interviewer = User::findOrFail($id);
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:25'],
            // 'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/ ', 'string', 'max:25'],
            'role' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:25'],

        ]);
        $interviewer->name = $request->name;
        $interviewer->email = $request->email;
        $interviewer->password =  $interviewer->password;
        $interviewer->role = $request->role;



        $interviewer->save();

        return redirect()->route('interviewer.index');
    }   


    public function destroy($id)
    {
        $interviewer = User::findOrFail($id);

        $interviewer->delete();
        return  back();
    }
}