<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Profile;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ja_JP');
    return [
        'profile_name' => $faker->name,
        'profile_oshi' => $faker->name,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        //
    ];
});
