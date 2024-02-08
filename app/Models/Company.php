<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'slogan',
        'industry',
        'description',
        'email',
        'password',
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
