<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function listingStock()
    {
        return $this->belongsTo('App\Models\ListingStock');
    }

    public function companyCategory()
    {
        return $this->belongsTo('App\Models\CompanyCategory');
    }
}
