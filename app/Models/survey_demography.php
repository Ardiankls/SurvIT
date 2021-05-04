<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_demography extends Model
{
    use HasFactory;

    protected $primaryKey = "survey_demography_id";

    protected $fillable = [
        'survey_id',
        'demography_id',
        'demography_type',
    ];

    public function survey() {
        return $this->belongsTo(survey::class, 'survey_id', 'id');
    }

    public function demography() {
        return $this->morphTo();
    }
}
