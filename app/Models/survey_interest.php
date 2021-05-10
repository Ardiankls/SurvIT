<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_interest extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'interest_id',
    ];
}
