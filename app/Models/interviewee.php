<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Type;
use App\Models\interview;


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
}