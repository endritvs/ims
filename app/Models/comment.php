<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee;
use App\Models\User;
use App\Models\interview;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'candidate_id',
        'questionnaire_id',
        'interview_id',
        'message',
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

}
