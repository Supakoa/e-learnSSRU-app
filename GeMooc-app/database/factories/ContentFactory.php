<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\content;
use Faker\Generator as Faker;

$factory->define(content::class, function (Faker $faker) {

    return [
        'name' => $faker->city,
        'type' => 3
    ];
});
