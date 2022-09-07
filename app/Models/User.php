<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\interview;
use App\Models\review;
use App\Models\comment;
use App\Models\Companies;
use App\Models\reviews_attributes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
   
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'img',
        'company_id'
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class, "company_id");
    }

    public function interview()
    {
        return $this->hasMany(interview::class);
    }

    public function review()
    {
        return $this->hasMany(review::class);
    }
    public function review_attributes()
    {
        return $this->hasMany(reviews_attributes::class);
    }
    public function comments()
    {
        return $this->hasMany(comment::class);
    }
}