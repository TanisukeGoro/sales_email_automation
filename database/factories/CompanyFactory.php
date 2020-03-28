<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'code' => '',
        'top_url' => 'http://',
        'form_url' => 'http://',
    ];
});
