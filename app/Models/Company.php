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

    public function approach()
    {
        return $this->hasMany('App\Models\Approach');
    }

    public function scopeGetCompanies($query)
    {
        return $query->with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory'])->paginate(15);
    }

    public function scopeGetDetailCompanies($query, $company_large_category_id, $company_middle_category_id, $freeword, $address, $listing_stock_id)
    {
        if (isset($company_large_category_id)) {
            $query->where('company_large_category_id', (int) $company_large_category_id);
        }

        if (isset($company_middle_category_id)) {
            $query->where('company_middle_category_id', (int) $company_middle_category_id);
        }

        if (isset($freeword)) {
            $query->where('name', 'like', "%{$freeword}%");
        }

        if (isset($address)) {
            $query->where('address', 'like', "%{$address}%");
        }

        if (isset($listing_stock_id)) {
            $query->where('listing_stock_id', $listing_stock_id);
        }

        return $query->with(['listingStock', 'companyLargeCategory', 'companyMiddleCategory']);
    }

    public function scopeGetSearchCompanies($query, $request)
    {
        if (isset($request->company_large_category_id)) {
            $query->where('company_large_category_id', (int) $request->company_large_category_id);
        }

        if (isset($request->company_middle_category_id)) {
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
