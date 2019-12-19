<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'hoshi',
        'email' => 'hoshi@gmail.com',
        'password' => bcrypt('hoshihoshi'),
        'admin' => true
      ]);
      $i = 0;
      while ($i < 50) {
        DB::table('users')->insert([
          'name' => str_random(10),
          'email' => str_random(10).'@gmail.com',
          'password' => bcrypt('secret'),
        ]);
        $i ++;
      }

      for ($m = 0; $m <= 10; $m ++) {
        DB::table('microposts')->insert([
          'user_id' =>  1,
          'title' => str_random(10),
          'content' => str_random(50),
        ]);
      }


        // $this->call(UsersTableSeeder::class);
    }
}
