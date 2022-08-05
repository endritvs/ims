<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Type;
use App\Models\interviewee;

class Interviewee_Attribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'interviewee_types_id'
    ];
    protected $table = 'interviewee_attributes';

    public function interviewee_type()
    {
        return $this->belongsTo(Interviewee_Type::class, "interviewee_types_id");
    }

    public function interviewee()
    {
        return $this->hasMany(interviewee::class);
    }
}