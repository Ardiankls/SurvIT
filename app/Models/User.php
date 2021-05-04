<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'email',
        'first_name',
        'last_name',
        'phone',
        'birthdate',
        'point',
        'gender_id',
        'address_id',
        'is_login',
        'is_verified',
        'is_admin',
        'is_survey_avail',
        'stat_delete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gender() {
        return $this->belongsTo(gender::class,'gender_id', 'id');
    }

    public function address() {
        return $this->belongsTo(address::class,'address_id', 'id');
    }

    public function job() {
        return $this->belongsTo(user_job::class, 'job_id', 'id');
    }

    public function interest() {
        return $this->belongsTo(user_interest::class, 'interest_id', 'id');
    }
}
