<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Interviewee_Type;
use App\Models\Interviewee_Attribute;
use App\Models\interviewee;

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

    // public function users()
    // {
    //     return $this->belongsTo(User::class, "interviewee");
    // }

    public function interviewees()
    {
        return $this->belongsTo(interviewee::class, "interviewees_id");
    }



    // public function interviewee_types()
    // {
    //     return $this->belongsTo(Interviewee_Type::class, "interviewee_type");
    // }

    // public function interviewee_attributes()
    // {
    //     return $this->belongsTo(Interviewee_Attribute::class, "interviewee_attribute");
    // }
}