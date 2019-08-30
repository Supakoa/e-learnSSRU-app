<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\course;
use Faker\Generator as Faker;

$factory->define(course::class, function (Faker $faker) {

    return [
        'name' => $faker->province,
        'detail' => $faker->city,
        'image' => 'cover_image_course/no_image.jpg',
        'video' => '',
        'type_video' => '',
    ];
});
