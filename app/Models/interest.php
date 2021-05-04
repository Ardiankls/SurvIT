<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interest extends Model
{
    use HasFactory;

    protected $fillable = [
        'interest',
    ];

    public function survey_demography(){
        return $this->morphMany('App\survey_demography','demography_id');
    }

    public function users(){
        return $this->belongsToMany(user::class, 'user_job', 'interest_id', 'user_id')->withTimeStamps();
    }
}
