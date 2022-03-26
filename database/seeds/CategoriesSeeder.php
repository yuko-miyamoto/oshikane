<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'category_name' => '演劇',
        ]);
        
        DB::table('categories')->insert([
            'id' => 2,
            'category_name' => 'コンサート',
        ]);
        
        DB::table('categories')->insert([
            'id' => 3,
            'category_name' => '配信',
        ]);
        
        DB::table('categories')->insert([
            'id' => 4,
            'category_name' => '映画',
        ]);
        
        DB::table('categories')->insert([
            'id' => 5,
            'category_name' => 'CD',
        ]);
        
        DB::table('categories')->insert([
            'id' => 6,
            'category_name' => 'DVD',
        ]);
        
        DB::table('categories')->insert([
            'id' => 7,
            'category_name' => '雑誌',
        ]);
        
        DB::table('categories')->insert([
            'id' => 8,
            'category_name' => '交通費',
        ]);
        
        DB::table('categories')->insert([
            'id' => 9,
            'category_name' => '宿泊費',
        ]);
        
        DB::table('categories')->insert([
            'id' => 10,
            'category_name' => 'ガチャ',
        ]);
        
        DB::table('categories')->insert([
            'id' => 11,
            'category_name' => 'その他',
        ]);
            
        //
    }
}
