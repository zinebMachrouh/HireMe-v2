<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillble = [
        'fname',
        'lname',
        'title',
        'currentPost',
        'industry',
        'adress',
        'about',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jobs()
    {
        return $this->belongsToMany(Job::class)->withTimestamps();
    }
}
