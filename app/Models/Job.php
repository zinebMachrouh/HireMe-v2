<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'skills',
        'contract',
        'visits',
        'location',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function applicants()
    {
        return $this->belongsToMany(Applicant::class)->withTimestamps();
    }
}
