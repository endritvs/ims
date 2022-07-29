<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Attribute;

class Interviewee_Type extends Model
{
    use HasFactory;
    protected $table = 'interviewee_types';
    protected $fillable = [
        'name'
    ];


    public function interviewee_attributes()
    {
        return $this->hasMany(Interviewee_Attribute::class);
    }
}