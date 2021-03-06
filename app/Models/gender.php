<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gender extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function survey(){
        return $this->hasMany(survey::class);
    }
}
