<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
    ];

    public function survey_demography(){
        return $this->morphMany('App\survey_demography','demography_id');
    }

    public function user(){
        return $this->hasMany(User::class);
    }

    public function surveys(){
        return $this->belongsToMany(survey::class, 'survey_provinces', 'province_id', 'survey_id')->withTimeStamps();
    }
}
