<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('promotions')->insert([
      'percentage'     => '10',
      'starting_at' => Carbon::parse('2000-01-01'),
      'terminate_at' => Carbon::parse('2002-01-01'),
    ]);
    }
}
