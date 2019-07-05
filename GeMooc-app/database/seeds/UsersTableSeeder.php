<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create()->each(function ($user) {
            $user->profile()->saveMany(factory(App\profile::class, 1)->make());
        });

        factory(App\subject::class, 10)->create()->each(function ($subject) {
            $subject->courses()->saveMany(factory(App\course::class, 2)->make())->each(function ($course) {
                $course->lessons()->saveMany(factory(App\lesson::class, 3)->make());
            });
        });

    }
}
