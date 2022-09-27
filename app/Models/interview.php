<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\interviewee;
use App\Models\review;
use App\Models\comment;
use App\Models\reviews_attributes;


class interview extends Model
{

    use HasFactory;
    protected $fillable = [
        'interview_id', 'interviewer', 'interview_date', 'interviewees_id', 'company_id',
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

    public function review_attributes()
    {
        return $this->hasMany(reviews_attributes::class);
    }
    
    public function comments()
    {
        return $this->hasMany(comment::class);
    }
    public function company()
    {
        return $this->belongsTo(Companies::class, "company_id");
    }
}