<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*ID 1 = BRUS*/
        DB::table('categories')->insert([
              'name' => 'Brus',
              'image' => null,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          ]);
          /*ID 2 = Snacks*/
          DB::table('categories')->insert([
                'name' => 'Snacks',
                'image' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            /*ID 3 = MAT*/
            DB::table('categories')->insert([
                  'name' => 'Mat',
                  'image' => null,
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ]);

              /*ID 4 = Diverse*/
              DB::table('categories')->insert([
                    'name' => 'Diverse',
                    'image' => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);

                /*ID 5 = Tobakk*/
                DB::table('categories')->insert([
                      'name' => 'Tobakk',
                      'image' => null,
                      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  ]);
    }
}
