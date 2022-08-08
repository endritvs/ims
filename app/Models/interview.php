<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class interview extends Model
{

    use HasFactory;
    protected $fillable = [
        'interviewer', 'interviewee', 'interview_date'
    ];
    protected $table = 'interviews';

    public function user()
    {
        return $this->belongsTo(User::class, "interviewer");
    }

    public function users()
    {
        return $this->belongsTo(User::class, "interviewee");
    }
   

    // public function users()
    // {
    //     return $this->hasOne(users::class);
    // }
}
