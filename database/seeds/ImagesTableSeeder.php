<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ImagesTableSeeder extends Seeder
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
        DB::table('images')->insert([
        'created_at'     => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
        'description'    => $faker->text($maxNbChars = 200),
        'path'           => $faker->imageUrl($width = 240, $height = 240),
        'id_shoe'        => $faker->numberBetween($min = 23, $max = 32),
      ]);
      }
    }
}
