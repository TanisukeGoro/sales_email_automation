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
            CompanyCategoriesTableSeeder::class,
            ListingStocksTableSeeder::class,
            UsersTableSeeder::class,
            // CompaniesTableSeeder::class,
            TemplatesTableSeeder::class,
            SentsTableSeeder::class,
            RedirectUrisTableSeeder::class,
            CompaniesSeeder::class,
        ]);
    }
}
