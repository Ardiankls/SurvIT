<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'transfer',
        'is_login',
        'email_verified_at',
        'is_survey_avail',
        'is_admin',
        'stat_delete',
        'edited_at',
        'gender_id',
        'province_id',
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

    public function province() {
        return $this->belongsTo(province::class, 'province_id', 'id');
    }

    public function jobs() {
        return $this->belongsToMany(job::class, 'user_jobs', 'user_id', 'job_id')->withTimeStamps();
    }

    public function interests() {
        return $this->belongsToMany(interest::class, 'user_interests', 'user_id', 'interest_id')->withTimeStamps();
    }

    public function surveys() {
        return $this->belongsToMany(survey::class, 'user_surveys', 'user_id', 'survey_id')->withTimeStamps();
    }

    public function account_payment(){
        return $this->hasMany(account_payment::class);
    }

    public function isAdmin() {
        if($this->is_admin == '1'){
            return true;
        }
        return false;
    }
}
