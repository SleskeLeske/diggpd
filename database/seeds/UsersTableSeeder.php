<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
            'firstName' => 'web',
            'lastName' => 'master',
            'email' => 'admin@diggpd.no',
            'password' => bcrypt('!12QaZ21!'),
            'confirmed' => 1,
            'confirmation_code' => null,
            'admin' => 1,
            'provider' => 0,
            'provider_id' => 0,
        ]);

        DB::table('users')->insert([
              'firstName' => 'Alex',
              'lastName' => 'Wallem',
              'email' => 'alexwallem@gmail.com',
              'password' => bcrypt('112233'),
              'confirmed' => 1,
              'confirmation_code' => null,
              'admin' => 0,
              'client' => 0,
              'driver' => 1,
              'provider' => 0,
              'provider_id' => 0,
          ]);
    }
}
