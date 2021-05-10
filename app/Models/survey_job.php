<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_job extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'job_id',
    ];
}
