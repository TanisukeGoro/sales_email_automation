<?php

use Illuminate\Database\Seeder;

class ListingStocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listingStocks = [
            ['一部上場', 'fst-section'],
            ['二部上場', 'snd-section'],
            ['マザーズ', 'mothers'],
            ['JASDAQスタンダード', 'jasdaq-standard'],
            ['JASDAQグロース', 'jasdaq-growth'],
        ];

        foreach ($listingStocks as $key => $listingStock) {
            DB::table('listing_stocks')->insert([
                'name' => $listingStock[0],
                'code' => $listingStock[1],
            ]);
        }
    }
}
