<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function index()
    {

        $review = review::with('candidates', 'questionnaires', 'interviews')->where('questionnaire_id',Auth::user()->id)->paginate(5);
      
        return view('review/table')->with('review', $review);
    }

 
    public function create()
    {
        //$interviewer = review::orderBy('id', 'desc')->get();
       // return view('interviewerComponents/create')->with(['interviewer' => $interviewer]);
    }

 
    public function store(Request $request)
    {

        if (empty($request['rating_amount'])) {
            $request['rating_amount'] = 10;
        }

        $request->validate([
            'candidate_id' => ['required'],
            'questionnaire_id' => ['required'],
            'interview_id' => ['required'],
            'rating_amount' => ['required',  'numeric', 'max:10'],
            
        ]); 
        
        review::create([
            'candidate_id' => $request['candidate_id'],
            'questionnaire_id' => $request['questionnaire_id'],
            'interview_id' => $request['interview_id'],
            'rating_amount' => $request['rating_amount'],
            
        ]);
      
        return redirect('/dashboard');
    }

  
    public function show(review $review)
    {
        //
    }

 
    public function edit(review $review)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $review = review::findOrFail($id);
    
        $review->rating_amount = $request->rating_amount;
        $review->save();
        return redirect('review');
    }

    public function destroy($id)
    {
        $review = review::findOrFail($id);
        $review->delete();
        return back();
    }
}
