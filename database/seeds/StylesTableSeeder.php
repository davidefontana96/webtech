<?php

use Illuminate\Database\Seeder;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('styles')->insert([
      'name'     => str_random(10),
      'description' => str_random(20),
    ]);
    }
}
