<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name',
        'company_large_category_id',
        'company_middle_category_id',
        'company_address',
        'n_employees',
        'hp_adress',
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

    public function SaleList()
    {
        return $this->hasMany('App\Models\SaleList');
    }

    public function redirect_uris()
    {
        return $this->hasMany('App\Models\RedirectUri');
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
}
