<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function listingStocks()
    {
        return $this->hasMany('App\Models\ListingStock');
    }
}
