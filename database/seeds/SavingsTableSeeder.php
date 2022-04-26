<?php

use Illuminate\Database\Seeder;
use App\Saving;
use Faker\Factory as Faker;

class SavingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Saving::class, 10)->create();
        //
    }
}
