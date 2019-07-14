<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\subject;
use Faker\Generator as Faker;
$factory->define(subject::class, function (Faker $faker ) {
    return [
        'name' => $faker->province,
        'detail' => $faker->city,
        'status' => 1,
        'sm_banner' => 'cover_image_subject/sm/no_image.jpg',
        'xl_banner' => 'cover_image_subject/xl/no_image.jpg'

    ];
});
