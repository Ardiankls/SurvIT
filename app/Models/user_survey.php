<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'survey_id',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function survey() {
        return $this->belongsTo(survey::class, 'survey_id', 'id');
    }
}
