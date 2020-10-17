<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'facebook',
        'linkedin',
        'official_position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function saleLists()
    {
        return $this->hasMany('App\Models\SaleList');
    }

    public function sents()
    {
        return $this->hasMany('App\Models\Sent');
    }

    public function templates()
    {
        return $this->hasMany('App\Models\Template');
    }

    public function companyLargeCategory()
    {
        return $this->belongsTo('App\Models\CompanyLargeCategory');
    }

    public function companyMiddleCategory()
    {
        return $this->belongsTo('App\Models\CompanyMiddleCategory');
    }

    public function maxSendCounts()
    {
        return $this->hasMany('App\Models\MaxSendCount');
    }

    public function UriClick()
    {
        return $this->hasOne('App\Models\UriClick');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    public function userCompany()
    {
        return $this->hasOne('App\Models\UserCompany');
    }

    public function approach()
    {
        return $this->hasMany('App\Models\Approach');
    }

    public function approachFolders()
    {
        return $this->hasMany('App\Models\ApproachFolder');
    }
}
