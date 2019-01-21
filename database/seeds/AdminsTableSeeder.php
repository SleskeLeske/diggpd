<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
            'user_id' => 1,
            'website_status' => 1,
            'admin_password' => 123,

        ]);
    }
}
