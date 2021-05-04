<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_payment extends Model
{
    use HasFactory;

    protected $table = "account_payment";

    protected $fillable = [
        'username',
        'method_id',
        'payment_information',
        'payment_status',
    ];
}
