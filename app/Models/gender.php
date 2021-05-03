<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gender extends Model
{
    use HasFactory;

    protected $primaryKey = "gender_id";

    protected $fillable = [
        'gender',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
