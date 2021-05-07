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

    public function users(){
        return $this->belongsToMany(User::class, 'user_jobs', 'job_id', 'user_id');
    }
}
