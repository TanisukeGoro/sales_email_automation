<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Approach;
use App\Models\ApproachFolder;
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Approach::class, function (Faker $faker) {
    $folder = ApproachFolder::all()->random();
    $company = Company::all()->random();
    return [
        'approach_folder_id' => $folder->id,
        'company_id' => $company->id,
        'phase' => \mt_rand(0, 5),
        'possibility' => \mt_rand(0, 4),
        'staff' => $faker->name,
        'email' => $faker->email,
        'memo' => $faker->text(100),
    ];
});
