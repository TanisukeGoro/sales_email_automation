<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            // CompaniesTableSeeder::class,
            CompaniesSeeder::class,
            CompanyCategoriesTableSeeder::class,
        ]);
    }
}
