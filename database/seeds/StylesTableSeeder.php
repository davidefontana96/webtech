<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,50) as $index) {
        DB::table('styles')->insert([
        'name'     => $faker->name,
        'description' => $faker->paragraph,
      ]);
      }
    }
}
