<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PromotionsTableSeeder extends Seeder
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
        DB::table('promotions')->insert([
        'percentage'     => $faker->numberBetween(1,35),
        'starting_at' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
        'terminate_at' => $faker->dateTimeBetween($startDate = '+10 years', $endDate = '+20 years', $timezone = null)
        ]);
        }
      }
}
