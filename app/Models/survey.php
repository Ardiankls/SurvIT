<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    use HasFactory;

    protected $primaryKey = "survey_id";

    protected $fillable = [
        'user_id',
        'age_from',
        'age_to',
        'point',
    ];

    public function user() {
        return $this->belongsTo(Users::class,'user_id', 'id');
    }
}
