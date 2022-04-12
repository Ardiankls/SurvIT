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
        'gender_id',
        'title',
        'link',
        'edit_link',
        'limit',
        'point',
        'count',
        'url',
        'shareable',
        'evidence',
        'package_id',
        'status_id',
        'opened_at',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id', 'id');
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

    public function users() {
        return $this->belongsToMany(User::class, 'user_surveys', 'survey_id', 'user_id')->withTimeStamps();
    }

    public function usersurvey() {
        return $this->hasMany(user_survey::class, 'survey_id', 'id');
    }

    public function status() {
        return $this->belongsTo(status::class,'status_id', 'id');
    }

    public function package() {
        return $this->belongsTo(package::class,'package_id', 'id');
    }
}
