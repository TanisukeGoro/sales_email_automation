<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyMiddleCategory extends Model
{
    public function Companies()
    {
        return $this->hasMany('App\Models\Company');
    }
}
