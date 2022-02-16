<?php

use Illuminate\Database\Seeder;
use App\Memory;
use Faker\Factory as Faker;

class MemoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Memory::class, 10)->create();
        
                
        //
    }
}
