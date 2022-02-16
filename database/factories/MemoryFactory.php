<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Memory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Memory::class, function (Faker $faker) {
    return [
        'stage_name' => $faker->realText(10),
        'artist' => $faker->name,
        'stage' => $faker->numberBetween(5000,6000),
        'place' => $faker->city,
        'stage_memo' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
        
        //
    ];
});
