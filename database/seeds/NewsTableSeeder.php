<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class NewsTableSeeder extends Seeder
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
        DB::table('news')->insert([
        'created_at'     => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
        'title'        => $faker->name,
        'texts'          => $faker->text($maxNbChars = 200),
        'id_user'       => $faker->numberBetween($min = 10, $max = 30),
        ]);
      }
    }
}
