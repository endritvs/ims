<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\interviewee;
use App\Models\review;

class interview extends Model
{

    use HasFactory;
    protected $fillable = [
        'interview_id', 'interviewer', 'interview_date', 'interviewees_id'
    ];
    protected $table = 'interviews';

    public function user()
    {
        return $this->belongsTo(User::class, "interviewer");
    }

 

    public function interviewees()
    {
        return $this->belongsTo(interviewee::class, "interviewees_id");
    }

    public function review()
    {
        return $this->hasMany(review::class);
    }

}