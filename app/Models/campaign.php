<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign',
        'description',
        'point',
        'is_ongoing'
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'user_campaigns', 'campaign_id', 'user_id')->withTimeStamps();
    }
}
