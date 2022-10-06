<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class additional_reviews extends Model
{
    use HasFactory;
    protected $table = 'additional_reviews';
    protected $fillable = [
        'candidate_id',
        'questionnaire_id',
        'name',
        'interview_id',
        'rating_amount',
        'company_id',
    ];

    public function candidates()
    {
        return $this->belongsTo(interviewee::class, "candidate_id");
    }

    public function company()
    {
        return $this->belongsTo(Companies::class, "company_id");
    }

    public function questionnaires()
    {
        return $this->belongsTo(User::class, "questionnaire_id");
    }
}
