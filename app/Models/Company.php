<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function listingStock()
    {
        return $this->belongsTo('App\Models\ListingStock');
    }

    public function companyLargeCategory()
    {
        return $this->belongsTo('App\Models\CompanyLargeCategory');
    }

    public function companyMiddleCategory()
    {
        return $this->belongsTo('App\Models\CompanyMiddleCategory');
    }

    public function scopeGetCompanies($query)
    {
        return $query->with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15);
    }

    public function scopeGetSearchCompanies($query, $request)
    {
        if ($request->company_large_category_id) {
            $query->where('company_large_category_id', (int) $request->company_large_category_id);
        }

        if ($request->company_middle_category_id) {
            $query->where('company_middle_category_id', (int) $request->company_middle_category_id);
        }

        if (isset($request->freeword)) {
            $query->where('name', 'like', "%{$request->freeword}%");
        }

        if (isset($request->address)) {
            $query->where('address', 'like', "%{$request->address}%");
        }

        if (isset($request->listing_stock_id)) {
            $query->where('listing_stock_id', $request->listing_stock_id);
        }

        return $query->with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15);
    }
}
