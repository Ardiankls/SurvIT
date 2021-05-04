<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_payment extends Model
{
    use HasFactory;

    protected $table = "account_payment";

    protected $fillable = [
        'user_id',
        'method_id',
        'payment_information',
        'payment_status',
    ];

    public function user() {
        return $this->belongsTo(Users::class,'user_id', 'id');
    }

    public function method() {
        return $this->belongsTo(pay_method::class,'method_id', 'id');
    }
}
