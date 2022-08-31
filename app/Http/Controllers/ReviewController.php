<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;



class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $review = review::with('candidates', 'questionnaires', 'interviews')->get();
      
        return view('review/index')->with('review', $review);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$interviewer = review::orderBy('id', 'desc')->get();
       // return view('interviewerComponents/create')->with(['interviewer' => $interviewer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorereviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'candidate_id' => ['required',  'string', 'max:25'],
            'questionnaire_id' => ['required', 'string', 'max:25'],
            'interview_id' => ['required', 'string', 'max:25'],
            'rating_amount' => ['required',  'numeric', 'max:1'],
            
        ]); */
        
        review::create([
            'candidate_id' => $request['candidate_id'],
            'questionnaire_id' => $request['questionnaire_id'],
            'interview_id' => $request['interview_id'],
            'rating_amount' => $request['rating_amount'],
            
        ]);
      
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatereviewRequest  $request
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatereviewRequest $request, review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(review $review)
    {
        //
    }
}
