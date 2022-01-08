<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class point_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status_id',
        'point',
        'account_payment_id',
        'user_survey_id',
    ];

    public function payment() {
        return $this->belongsTo(account_payment::class, 'account_payment_id', 'id');
    }

    public function usersurvey() {
        return $this->belongsTo(user_survey::class, 'user_survey_id', 'id');
    }

    public function status() {
        return $this->belongsTo(status::class, 'status_id', 'id');
    }
}
