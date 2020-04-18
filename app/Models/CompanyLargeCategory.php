<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyLargeCategory extends Model
{
    public function Companies()
    {
        return $this->hasMany('App\Models\Company');
    }
}
