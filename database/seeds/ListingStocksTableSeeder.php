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
            ['その他市場', 'other-stock'],
            ['未上場', 'unlisted'],
            ['不明', 'unknown'],
        ];

        foreach ($listingStocks as $key => $listingStock) {
            DB::table('listing_stocks')->insert([
                'name' => $listingStock[0],
                'code' => $listingStock[1],
            ]);
        }
    }
}
