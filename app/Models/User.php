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
        'name', 'email', 'password', 'company_name', 'company_category_id', 'company_address', 'n_employees', 'hp_adress',
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

    public function search_conditions()
    {
        return $this->hasMany('App\Models\SearchConditions');
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

    public function companyCategory()
    {
        return $this->belongsTo('App\Models\CompanyCategory');
    }

    public function sendCounts()
    {
        return $this->hasMany('App\Models\SendCount');
    }
}
