<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pay_method_id',
        'bank',
        'transfer',
        'value',
        'payment_information',
        'payment_status',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id', 'id');
    }


}
