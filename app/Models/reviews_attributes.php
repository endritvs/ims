<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee;
use App\Models\User;
use App\Models\interview;
use App\Models\Interviewee_Attribute;

class reviews_attributes extends Model
{
    use HasFactory;
    protected $table = 'reviews_attributes';
    protected $fillable = [
        'candidate_id',
        'questionnaire_id',
        'interview_id',
        'rating_amount',
        'attribute_id',
        'company_id',
    ];

    public function candidates()
    {
        return $this->belongsTo(interviewee::class, "candidate_id");
    }
    public function questionnaires()
    {
        return $this->belongsTo(User::class, "questionnaire_id");
    }
    public function interviews()
    {
        return $this->belongsTo(interview::class, "interview_id");
    }
    public function attributes()
    {
        return $this->belongsTo(Interviewee_Attribute::class, "attribute_id");
    }
    public function company()
    {
        return $this->belongsTo(Companies::class, "company_id");
    }
}
