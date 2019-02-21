<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,900) as $index) {
        DB::table('likes')->insert([
        'created_at'     => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
        'id_shoe'        => $faker->numberBetween($min = 1, $max = 30),
        'id_user'        => $faker->numberBetween($min = 1, $max = 30),
        ]);
      }
    }
}
