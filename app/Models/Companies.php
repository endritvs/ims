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
}
