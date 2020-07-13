<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SaleList extends Model
{
    protected $fillable = ['user_id', 'name', 'freeword', 'company_large_category_id', 'company_middle_category_id', 'listing_stock_id', 'address'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function date()
    {
        return \date('Y年m月d日', \strtotime($this->created_at));
    }

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

    public function createSaleList($request): void
    {
        $this->user_id = Auth::id();
        $this->fill($request->all())->save();
    }
}
