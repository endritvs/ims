<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Type;
use App\Models\reviews_attributes;

class Interviewee_Attribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'interviewee_type_id','company_id',
    ];
    protected $table = 'interviewee_attributes';

    public function interviewee_type()
    {
        return $this->belongsTo(Interviewee_Type::class, "interviewee_type_id","id");
    }
    public function review_attributes()
    {
        return $this->hasMany(reviews_attributes::class);
    }
   public function company()
    {
        return $this->belongsTo(Companies::class, "company_id");
    }
}