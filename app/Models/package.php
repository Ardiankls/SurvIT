<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'duration',
        'respondent',
        'consulation',
        'created_by',
        'price',
    ];
}