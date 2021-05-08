<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        //'age_from',
        //'age_to',
        //'point'
        'title',
        'link',
        'pay',
        'gender_id',
        'limit',
    ];

    public function user() {
        return $this->belongsTo(Users::class,'user_id', 'id');
    }

    public function gender() {
        return $this->belongsTo(gender::class,'gender_id', 'id');
    }

    public function jobs() {
        return $this->belongsToMany(job::class, 'survey_jobs', 'survey_id', 'job_id')->withTimeStamps();
    }

    public function interests() {
        return $this->belongsToMany(interest::class, 'survey_interests', 'survey_id', 'interest_id')->withTimeStamps();
    }

    public function provinces() {
        return $this->belongsToMany(province::class, 'survey_provinces', 'survey_id', 'province_id')->withTimeStamps();
    }
}
