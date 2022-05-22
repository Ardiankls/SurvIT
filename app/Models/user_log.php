<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'table',
        'user_id',
        'log_desc',
        'log_path',
        'log_ip',
    ];
}
