<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Expense::class,function (Faker $faker) {
    $now = Carbon::now();
    return [
            'stage' => $faker->numberBetween(5000,6000),
            'stage_memo' => $faker->realText(20),
            'concert' => $faker->numberBetween(5000,6000),
            'concert_memo' => $faker->realText(20),
            'web' => $faker->numberBetween(5000,6000),
            'web_memo' => $faker->realText(20),
            'movie' => $faker->numberBetween(5000,6000),
            'movie_memo' => $faker->realText(20),
            'cd' => $faker->numberBetween(5000,6000),
            'cd_memo' => $faker->realText(20),
            'dvd' => $faker->numberBetween(5000,6000),
            'dvd_memo' => $faker->realText(20),
            'magazine' => $faker->numberBetween(5000,6000),
            'magazine_memo' => $faker->realText(20),
            'train' => $faker->numberBetween(5000,6000),
            'train_memo' => $faker->realText(20),
            'travel' => $faker->numberBetween(5000,6000),
            'travel_memo' => $faker->realText(20),
            'toy' => $faker->numberBetween(5000,6000),
            'toy_memo' => $faker->realText(20),
            'others' => $faker->numberBetween(5000,6000),
            'others_memo' => $faker->realText(20),
            'paid_at' => $faker->dateTimeBetween($startDate = '-1year', $endDate = 'now')->format('Y-m-d'),
            'user_id' => $faker->numberBetween(1,2),
            'oshi_id' => $faker->numberBetween(5,6),
            'created_at' => $now,
            'updated_at' => $now,
        ];
    
});
