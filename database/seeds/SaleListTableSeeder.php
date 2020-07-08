<?php

use Illuminate\Database\Seeder;

class SaleListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 10; $i++) {
            DB::table('sale_lists')->insert([
                'user_id' => 1,
                'name' => '農業上場',
                'freeword' => null,
                'company_large_category_id' => null,
                'company_middle_category_id' => null,
                'listing_stock_id' => 1,
                'address' => null,
            ]);
        }
    }
}
