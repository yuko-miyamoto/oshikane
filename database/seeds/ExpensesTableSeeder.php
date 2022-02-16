<?php

use Illuminate\Database\Seeder;
use App\Expense;
use Faker\Factory as Faker;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Expense::class, 20)->create();
    }
}
