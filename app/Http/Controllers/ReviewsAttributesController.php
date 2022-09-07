<?php

namespace App\Http\Controllers;

use App\Models\reviews_attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review_attributes = reviews_attributes::with('candidates', 'questionnaires', 'interviews', 'attributes')->get();

        // $rates = DB::table('reviews')
        //     ->where('$rA->candidate_id', 2)
        //     ->groupBy('$rA->candidate_id')
        //     ->avg('rate');

        //     dd($rates);


        return view('review/attributes_table')->with('review_attributes', $review_attributes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storereviews_attributesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'candidate_id' => ['required'],
        //     'questionnaire_id' => ['required'],
        //     'interview_id' => ['required'],
        //     'rating_amount' => ['required',  'numeric', 'max:10'],
        //     'attribute_id' => ['required'],
        // ]); 

        
        for ($i=0; $i < count($request['attribute_id']); $i++) { 

            reviews_attributes::create([
            'candidate_id' => $request['candidate_id'],
            'questionnaire_id' => $request['questionnaire_id'],
            'interview_id' => $request['interview_id'],
            'rating_amount' => $request['rating_amount'][$i],
            'attribute_id' => $request['attribute_id'][$i],
            ]);
        }
        
      
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reviews_attributes  $reviews_attributes
     * @return \Illuminate\Http\Response
     */
    public function show(reviews_attributes $reviews_attributes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reviews_attributes  $reviews_attributes
     * @return \Illuminate\Http\Response
     */
    public function edit(reviews_attributes $reviews_attributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatereviews_attributesRequest  $request
     * @param  \App\Models\reviews_attributes  $reviews_attributes
     * @return \Illuminate\Http\Response
     */
    public function update(Updatereviews_attributesRequest $request, reviews_attributes $reviews_attributes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reviews_attributes  $reviews_attributes
     * @return \Illuminate\Http\Response
     */
    public function destroy(reviews_attributes $reviews_attributes)
    {
        //
    }
}