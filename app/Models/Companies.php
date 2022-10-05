<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Companies extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function interview()
    {
        return $this->hasMany(interview::class);
    }

    public function interviewee_attributes()
    {
        return $this->hasMany(Interviewee_Attribute::class);
    }

    public function interviewee_type()
    {
        return $this->hasMany(Interviewee_Type::class);
    }

    public function interviewees()
    {
        return $this->hasMany(interviewee::class);
    }

    public function review()
    {
        return $this->hasMany(review::class);
    }

    public function reviews_attributes()
    {
        return $this->hasMany(reviews_attributes::class);
    }

    public function additional_reviews()
    {
        return $this->hasMany(additional_reviews::class);
    }
}
