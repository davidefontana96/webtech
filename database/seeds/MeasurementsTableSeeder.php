<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,200) as $index) {
        DB::table('measurements')->insert([
        'created_at'     => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
        'size_shoe'      => $faker->numberBetween($min = 36, $max = 48),
        'id_shoe'        => $faker->numberBetween($min = 5, $max = 44),
        'element'        => $faker->numberBetween($min = 1, $max = 50),
        'price'          => $faker->numberBetween($min = 60, $max = 200),
        ]);
      }
    }
}
