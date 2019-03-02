<?php

use Illuminate\Database\Seeder;
use database\seeds\UsersTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BrandsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(StylesTableSeeder::class);



    }
}
