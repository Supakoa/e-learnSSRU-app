<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\quiz;
use Faker\Generator as Faker;

$factory->define(quiz::class, function (Faker $faker) {
    $random =$faker->numberBetween($min = 1, $max =4);

    return [
        'name' => $faker->province,
    ];
});
