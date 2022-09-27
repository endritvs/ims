<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Attribute;
use App\Models\interviewee;


class Interviewee_Type extends Model
{
    use HasFactory;
    protected $table = 'interviewee_types';
    protected $fillable = [
        'name',
        'company_id',
    ];

    protected $with=["interviewee_attributes"];

    public function interviewee_attributes()
    {
        return $this->hasMany(Interviewee_Attribute::class,"interviewee_type_id");
    }

    public function interviewee()
    {
        return $this->hasMany(Interviewee::class);
    }
    public function company()
    {
        return $this->belongsTo(Companies::class, "company_id");
    }
    
}