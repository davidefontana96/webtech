<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ReviewsTableSeeder extends Seeder
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
         DB::table('reviews')->insert([
         'created_at'     => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
         'text'           => $faker->text($maxNbChars = 200),
         'id_shoe'        => $faker->numberBetween($min = 5, $max = 44),
         'id_user'        => $faker->numberBetween($min = 1, $max = 50),
         'star'           => $faker->numberBetween($min = 1, $max = 5),
         ]);
       }
     }
}
