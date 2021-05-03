<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $primaryKey = "job_id";

    protected $fillable = [
        'job',
        'job_type',
    ];

    public function survey_demogrpahy(){
        return $this->hasMany(survey_demography::class);
    }

    public function user_jobs(){
        return $this->belongsToMany(job::class, 'user_job', 'job_id', 'username')->withTimeStamps();
    }
}
