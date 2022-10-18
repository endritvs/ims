<?php

namespace App\Http\Controllers;

use App\Models\additional_reviews;
use App\Http\Requests\Storeadditional_reviewsRequest;
use App\Http\Requests\Updateadditional_reviewsRequest;
use App\Models\interview;
use App\Models\User;
use App\Models\review;
use App\Models\interviewee;
use App\Models\comment;
use App\Models\Interviewee_Type;
use App\Models\reviews_attributes;
use Illuminate\Support\Facades\Auth;

class AdditionalReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviewAll = interview::with('user', 'interviewees', 'review')->where('interviewer', Auth::user()->id)->where('company_id', Auth::user()->company_id)->orderBy('interview_date', 'desc')->get();
        
        dd($interviewAll);
        return view('interviewComponents/public_table')->with('interviewAll', $interviewAll);
    }

    public function store(Request $request)
    {

        $request->validate([
            'candidate_id' => ['required'],
            'name' => ['required'],
            'interview_id' => ['required'],
            'rating_amount' => ['required',  'numeric', 'max:5'],
            'company_id' => ['required'],
        ]); 

        additional_reviews::create([
            'candidate_id' => $request['candidate_id'],
            'name' => $request['name'],
            'interview_id' => $request['interview_id'],
            'rating_amount' => $request['rating_amount_additional'],
            'company_id' => Auth::user()->company_id,
        ]);
      
        return  back();
    }
 
    public function edit($id)
    {
        $additional_reviews = additional_reviews::orderBy('id', 'desc')->get();
        return back();
    }

    public function update(Request $request, $id)
    {
        $additional_reviews = additional_reviews::findOrFail($id);

        $request->validate([
            'candidate_id' => ['required'],
            'name' => ['required'],
            'interview_id' => ['required'],
            'rating_amount' => ['required',  'numeric', 'max:5'],
        ]); 

        $additional_reviews->candidate_id = $request->candidate_id;
        $additional_reviews->name = $request->name;
        $additional_reviews->interview_id = $request->interview_id;
        $additional_reviews->rating_amount = $request->rating_amount;
        $additional_reviews->save();

        return back();
    }
    public function destroy($id)
    {
        $additional_reviews = additional_reviews::findOrFail($id);
        $additional_reviews->delete();
        return back();
    }
}
