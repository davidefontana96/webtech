<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,10) as $index) {
        DB::table('shoes')->insert([
        'created_at'     => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
        'name'           => $faker->word,
        'details'        => $faker->text($maxNbChars = 200),
        'sex'            => 'F',
        'id_category'    => $faker->numberBetween($min = 73, $max = 82),
        'id_style'       => $faker->numberBetween($min = 64, $max = 74),
        'id_brand'       => $faker->numberBetween($min =68, $max = 79),
        'id_promo'       => $faker->numberBetween($min = 1, $max = 80),
        'id_news'       => $faker->numberBetween($min = 10, $max = 100),
        ]);
      }
    }
}
