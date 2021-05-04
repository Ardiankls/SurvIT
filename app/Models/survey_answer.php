<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_q_id',
        'username',
        'answer',
    ];

    public function survey_q(){
        return $this->belongsTo(survey_q::class, 'survey_q_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
