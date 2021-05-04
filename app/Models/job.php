<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_name',
    ];

    public function survey_demography(){
        return $this->morphMany('App\survey_demography','demography_id');
    }

    public function user_jobs(){
        return $this->belongsToMany(job::class, 'user_job', 'job_id', 'username')->withTimeStamps();
    }
}
