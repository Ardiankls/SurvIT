<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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
        'email_verified_at',
        'is_admin',
        'is_survey_avail',
        'stat_delete',
        'job_id',
        'interest_id'
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

    // public function jobs() {
    //     return $this->belongsToMany(user::class, 'user_jobs', 'job_id', 'user_id')->withTimeStamps();
    // }

    // public function interests() {
    //     return $this->belongsToMany(user::class, 'user_interests', 'user_id', 'interest_id')->withTimeStamps();
    // }

    public function job() {
        return $this->belongsTo(job::class,'job_id', 'id');
    }

    public function interest() {
        return $this->belongsTo(interest::class,'interest_id', 'id');
    }
}
