<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\course;
use Faker\Generator as Faker;

$factory->define(course::class, function (Faker $faker) {

    return [
        'name' => $faker->province,
        'detail' => $faker->city,
        'sm_banner' => 'cover_image_course/sm/no_image.jpg',
        'xl_banner' => 'cover_image_course/xl/no_image.jpg'
    ];
});
