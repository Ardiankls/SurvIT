<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pay_method extends Model
{
    use HasFactory;

    protected $primaryKey = "method_id";

    protected $fillable = [
        'method_name',
        'method_status',
    ];

    public function account_payment(){
        return $this->hasMany(account_payment::class);
    }
}
