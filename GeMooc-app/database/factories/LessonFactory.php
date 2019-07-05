<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\lesson;
use Faker\Generator as Faker;

$factory->define(lesson::class, function (Faker $faker) {

    return [
        'name' => $faker->province,
    ];
});
