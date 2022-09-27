<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Type;
use App\Models\interview;
use App\Models\review;
use App\Models\comment;
use App\Models\reviews_attributes;

class interviewee extends Model
{
    use HasFactory;
    protected $table = 'interviewees';
    protected $fillable = [
        'name',
        'surname',
        'cv_path',
        'external_cv_path',
        'email',
        'interviewee_types_id',
        'img',
        'company_id',
    ];


    protected $with=["interviewee_type"];


    public function interviewee_type()
    {
        return $this->belongsTo(Interviewee_Type::class, "interviewee_types_id");
    }
 

    public function interview()
    {
        return $this->hasMany(interview::class);
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