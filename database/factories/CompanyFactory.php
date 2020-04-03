<?php

use App\Models\Company;
use App\Models\CompanyCategory;
// @var \Illuminate\Database\Eloquent\Factory $factory

use App\Models\ListingStock;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'code' => '',
        'listing_stock_id' => \mt_rand(1, ListingStock::all()->count() !== 0 ? ListingStock::all()->count() : 2),
        'company_category_id' => \mt_rand(1, CompanyCategory::all()->count() !== 0 ? CompanyCategory::all()->count() : 2),
        'address' => $faker->address,
        'n_employees' => \mt_rand(100, 30000),
        'top_url' => 'http://',
        'form_url' => 'http://',
    ];
});
