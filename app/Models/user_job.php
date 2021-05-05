<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_job extends Model
{
    use HasFactory;

    protected $table = 'user_jobs';

    protected $fillable = [
        'user_id',
        'job_id',
    ];

    // public function user() {
    //     return $this->belongsTo(User::class,'user_id', 'id');
    // }
    // public function job() {
    //     return $this->belongsTo(job::class,'job_id', 'id');
    // }
}
