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
        'job_id',
        'interest_id',
        'limit',
    ];

    public function user() {
        return $this->belongsTo(Users::class,'user_id', 'id');
    }

    public function gender() {
        return $this->belongsTo(gender::class,'gender_id', 'id');
    }

    public function job() {
        return $this->belongsTo(job::class,'job_id', 'id');
    }

    public function interest() {
        return $this->belongsTo(interest::class,'interest_id', 'id');
    }
}
