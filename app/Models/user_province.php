<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_province extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'province_id',
    ];
}
