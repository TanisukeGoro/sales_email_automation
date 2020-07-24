<?php

namespace App\Http\Controllers;

use App\Models\CompanyLargeCategory;
use App\Models\CompanyMiddleCategory;
use App\Models\ListingStock;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    //FIXME メソッド位置変えてok
    public function configure()
    {
        return [
            'company_large_categories' => CompanyLargeCategory::select(['id', 'name'])->get(),
            'company_middle_categories' => CompanyMiddleCategory::select(['id', 'name'])->get(),
            'listing_stocks' => ListingStock::select(['id', 'name'])->get(),
        ];
    }
}
