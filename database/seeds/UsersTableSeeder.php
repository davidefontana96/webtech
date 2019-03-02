<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,30) as $index) {
        DB::table('users')->insert([
        'created_at'     => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
        'name'           => $faker->name,
        'surname'        => $faker->name,
        'email'          => $faker->email,
        'avatar'         => $faker->imageUrl($width = 50, $height = 50),
        'password'       => bcrypt('secret'),
        'address'        => $faker->address,
        ]);
      }
    }
}
