<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_interest extends Model
{
    use HasFactory;
    protected $table = 'user_interests';

    protected $fillable = [
        'user_id',
        'interest_id',
    ];

    public function user() {
        return $this->belongsTo(Users::class,'user_id', 'id');
    }
    public function interest() {
        return $this->belongsTo(interest::class,'interest_id', 'id');
    }
}
