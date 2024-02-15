<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use Notifiable, HasFactory, SoftDeletes;

    protected $guarded = [];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
