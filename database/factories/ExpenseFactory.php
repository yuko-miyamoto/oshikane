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
            'stage_memo' => $faker->realText(10),
            'concert' => $faker->numberBetween(5000,6000),
            'concert_memo' => $faker->realText(10),
            'web' => $faker->numberBetween(5000,6000),
            'web_memo' => $faker->realText(10),
            'movie' => $faker->numberBetween(5000,6000),
            'movie_memo' => $faker->realText(10),
            'cd' => $faker->numberBetween(5000,6000),
            'cd_memo' => $faker->realText(10),
            'dvd' => $faker->numberBetween(5000,6000),
            'dvd_memo' => $faker->realText(10),
            'magazine' => $faker->numberBetween(5000,6000),
            'magazine_memo' => $faker->realText(10),
            'train' => $faker->numberBetween(5000,6000),
            'train_memo' => $faker->realText(10),
            'travel' => $faker->numberBetween(5000,6000),
            'travel_memo' => $faker->realText(10),
            'toy' => $faker->numberBetween(5000,6000),
            'toy_memo' => $faker->realText(10),
            'others' => $faker->numberBetween(5000,6000),
            'others_memo' => $faker->realText(10),
            'paid_at' => $faker->dateTimeBetween($startDate = '-1year', $endDate = 'now')->format('Y-m-d'),
            'user_id' => $faker->numberBetween(1,4),
            'oshi_id' => $faker->numberBetween(1,3),
            'category_id' => $faker->numberBetween(1,3),
            'created_at' => $now,
            'updated_at' => $now,
        ];
    
});
