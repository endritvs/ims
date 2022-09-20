<?php

namespace App\Http\Controllers;

use App\Models\review;
use App\Models\comment;
use App\Models\reviews_attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\interview;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Europe/Belgrade");
        $today = date("Y-m-d H:i:s");
 
        $review = review::with('candidates', 'questionnaires', 'interviews')->where('questionnaire_id',Auth::user()->id)->paginate(5);
        $reviews = interview::with('user', 'interviewees', 'review')->where('interview_date', '<', $today)->where('interviewer', Auth::user()->id)->orderBy('interview_date', 'desc')->first();
        return view('review/table')->with(['review'=>$review,'reviews'=> $reviews]);
    }

 
    public function create()
    {
       
       date_default_timezone_set("Europe/Belgrade");
       $today = date("Y-m-d H:i:s");

       $pastInterview = interview::with('user', 'interviewees', 'review')->where('interview_date', '<', $today)->where('interviewer', Auth::user()->id)->orderBy('interview_date', 'asc')->paginate(5);

       return view('/review/allRatings')->with('pastInterview', $pastInterview);
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
            'rating_amount' => ['required',  'numeric', 'max:5'],
            
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

    public function rateComment(Request $request){
        for ($i=0; $i < count($request['attribute_id']); $i++) { 

            reviews_attributes::create([
            'candidate_id' => $request['candidate_id'],
            'questionnaire_id' => Auth::user()->id,
            'interview_id' => $request['interview_id'],
            'rating_amount' => $request['rating_amount'][$i],
            'attribute_id' => $request['attribute_id'][$i],
            ]);
        }
        review::create([
            'candidate_id' => $request['candidate_id'],
            'questionnaire_id' => Auth::user()->id,
            'interview_id' => $request['interview_id'],
            'rating_amount' => $request['rating_amount_review'],
            
        ]);

        comment::create([
            'candidate_id' => $request['candidate_id'],
            'questionnaire_id' => Auth::user()->id,
            'interview_id' => $request['interview_id'],
            'message' => $request['message'],
        ]);

        return back();
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
