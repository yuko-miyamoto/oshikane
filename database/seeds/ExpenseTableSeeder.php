<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'stage' => Str::random(10),
            'stage_memo' => Str::random(10),
            'concert' => Str::random(10),
            'concert_memo' => Str::random(10),
            'web' => Str::random(10),
            'web_memo' => Str::random(10),
            'movie' => Str::random(10),
            'movie_memo' => Str::random(10),
            'cd' => Str::random(10),
            'cd_memo' => Str::random(10),
            'dvd' => Str::random(10),
            'dvd_memo' => Str::random(10),
            'magazine' => Str::random(10),
            'magazine_memo' => Str::random(10),
            'train' => Str::random(10),
            'train_memo' => Str::random(10),
            'travel' => Str::random(10),
            'travel_memo' => Str::random(10),
            'toy' => Str::random(10),
            'toy_memo' => Str::random(10),
            'others' => Str::random(10),
            'others_memo' => Str::random(10),
            'oshi_id' => Str::random(10),
            'user_id' => 1,]);
        
        //
    }
}
