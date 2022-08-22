<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Type;
use App\Models\interviewee;
use App\Models\interview;

class Interviewee_Attribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'interviewee_type_id'
    ];
    protected $table = 'interviewee_attributes';

    public function interviewee_type()
    {
        return $this->belongsTo(Interviewee_Type::class, "interviewee_type_id","id");
    }

    // public function interviewee()
    // {
    //     return $this->hasMany(interviewee::class);
    // }

    // public function interview()
    // {
    //     return $this->hasMany(interview::class);
    // }
}