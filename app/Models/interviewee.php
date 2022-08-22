<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Type;
use App\Models\Interviewee_Attribute;
use App\Models\interview;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class interviewee extends Model
{
    use HasFactory;
    protected $table = 'interviewees';
    protected $fillable = [
        'name',
        'surname',
        'cv_path',
        'external_cv_path',
        'interviewee_types_id',
        'img',
    ];

    // protected $casts = [
    //     'interviewee_attributes_id' => AsCollection::class,
    // ];
    protected $with=["interviewee_type"];


    public function interviewee_type()
    {
        return $this->belongsTo(Interviewee_Type::class, "interviewee_types_id");
    }
    // public function interviewee_attribute()
    // {
    //     return $this->belongsTo(Interviewee_Attribute::class, "interviewee_attributes_id");
    // }

    public function interview()
    {
        return $this->hasMany(interview::class);
    }
}