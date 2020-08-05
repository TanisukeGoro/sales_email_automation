<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ApproachFolder;
use Faker\Generator as Faker;

$factory->define(ApproachFolder::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => \implode(' ', $faker->unique->words(3)),
    ];
});
