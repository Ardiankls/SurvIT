<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function survey(){
        return $this->hasMany(survey::class);
    }

    public function point_log(){
        return $this->hasMany(point_log::class);
    }

}
