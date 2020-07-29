<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ApproachFolder;
use Faker\Generator as Faker;

$factory->define(ApproachFolder::class, function (Faker $faker) {
    $title = ['あいうえお', '農業上場', '情報企業', '大工', 'セントラル', '大企業', 'ゲーム', '一次産業', '二次産業', 'サービス業', 'PC'];

    return [
        'user_id' => 1,
        'title' => $title[\mt_rand(0, \count($title) - 1)],
    ];
});
