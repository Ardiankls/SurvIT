<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'campaign_id',
    ];

    public function user() {
        return $this->belongsTo(survey::class, 'user_id', 'id');
    }

    public function campaign() {
        return $this->belongsTo(campaign::class, 'campaign_id', 'id');
    }

    public function point_log() {
        return $this->hasMany(point_log::class);
    }
}
