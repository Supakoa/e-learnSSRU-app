<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\subject;
use Faker\Generator as Faker;
$factory->define(subject::class, function (Faker $faker ) {
    return [
        'name' => $faker->province,
        'detail' => $faker->city,
        'status' => 1,
        'image' => 'cover_image_subject/no_image.jpg',
        'video' => '',
        'type_video' => '',
    ];
});
