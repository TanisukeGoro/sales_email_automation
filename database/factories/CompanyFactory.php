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
        'listing_stock_id' => \mt_rand(1, ListingStock::all()->count()),
        'company_category_id' => \mt_rand(1, CompanyCategory::all()->count()),
        'address' => $faker->address,
        'n_employees' => \mt_rand(100, 30000),
        'top_url' => 'http://',
        'form_url' => 'http://',
    ];
});
