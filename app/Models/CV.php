<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_id',
        'hardSkills',
        'softSkills',
        'education',
        'languages',
        'experiences',
    ];
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
