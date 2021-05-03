<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $primaryKey = "address_id";

    protected $fillable = [
        'city',
        'postal_code',
        'phone',
        'address_detail',
        'username',
        'stat_delete',
    ];

    public function username(){
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
