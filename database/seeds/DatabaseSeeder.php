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
            // CompanyCategoriesTableSeeder::class,
            CompanyLargeCategorySeeder::class,
            CompanyMiddleCategorySeeder::class,
            ListingStocksTableSeeder::class,
            PlansTableSeeder::class,
            UsersTableSeeder::class,
            TemplatesTableSeeder::class,
            CompaniesTableSeeder::class,
            CompaniesSeeder::class,
            SentsTableSeeder::class,
            SaleListTableSeeder::class,
        ]);
    }
}
