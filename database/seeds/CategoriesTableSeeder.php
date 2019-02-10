<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
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
        DB::table('categories')->insert([
        'name'     => $faker->word,
        'features' => $faker->word,
      ]);
      }
    }
}
