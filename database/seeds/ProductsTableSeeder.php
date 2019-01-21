<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
            'name' => 'Cola 1.5',
            'category_id' => '1',
            'description' => '1.5 l Cola',
            'times_bought' => 0,
            'image' => null,
            'price' => 52,
            'user_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);


    }
}
