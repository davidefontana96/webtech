<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,100) as $index) {
        DB::table('coupons')->insert([
        'created_at'     => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
        'code_coupon'    => $faker->word,
        'percentage'     => $faker->numberBetween($min = 5, $max = 50),
        ]);
      }
    }
}
