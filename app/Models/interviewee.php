<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Interviewee_Type;

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


    public function interviewee_type()
    {
        return $this->belongsTo(Interviewee_Type::class, "interviewee_types_id");
    }
}
