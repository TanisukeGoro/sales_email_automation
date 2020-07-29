<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApproachFolder extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
        'user_id',
    ];

    // Approachの更新に紐付けて自動的に更新するようにする
    protected $touches = ['approaches'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function approaches()
    {
        return $this->hasMany('App\Models\Approach');
    }
}
