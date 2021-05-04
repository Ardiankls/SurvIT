<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_q extends Model
{
    use HasFactory;

    protected $primaryKey = "survey_q_id";

    protected $fillable = [
        'survey_id',
        'qtype',
        'question',
        'null_able',
    ];

    public function survey() {
        return $this->belongsTo(survey::class,'survey_id', 'id');
    }
}
