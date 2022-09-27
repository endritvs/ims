<?php

namespace App\Http\Controllers;

use App\Models\comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  
    public function index()
    {
        $comment = comment::with('candidates', 'questionnaires', 'interviews')->get();
        return view('interviewComponents/public_table')->with('comment', $comment);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        comment::create([
            'candidate_id' => $request['candidate_id'],
            'questionnaire_id' => Auth::user()->id,
            'interview_id' => $request['interview_id'],
            'message' => $request['message'],
            'company_id' => Auth::user()->company_id
        ]);

        return back();
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        
    }
}
