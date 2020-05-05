<?php

use App\Models\Company;
use App\Models\CompanyLargeCategory;
use App\Models\CompanyMiddleCategory;
// @var \Illuminate\Database\Eloquent\Factory $factory

use App\Models\ListingStock;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'code' => null,
        'listing_stock_id' => \mt_rand(1, ListingStock::all()->count() !== 0 ? ListingStock::all()->count() : 2),
        'company_large_category_id' => \mt_rand(1, CompanyLargeCategory::all()->count() !== 0 ? CompanyLargeCategory::all()->count() : 2),
        'company_middle_category_id' => \mt_rand(1, CompanyMiddleCategory::all()->count() !== 0 ? CompanyMiddleCategory::all()->count() : 2),
        'address' => $faker->address,
        'n_employees' => \mt_rand(100, 30000),
        'top_url' => 'http://',
        'form_url' => 'http://',
    ];
});
