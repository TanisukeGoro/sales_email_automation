<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SaleListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now('Asia/Tokyo');

        $name = ['あいうえお', '農業上場', '情報企業', '大工', 'セントラル', '大企業', 'ゲーム', '一次産業', '二次産業', 'サービス業', 'PC'];

        for ($i = 0; $i <= 10; $i++) {
            $day = $i + 1;

            DB::table('sale_lists')->insert([
                'user_id' => 1,
                'name' => $name[$i],
                'freeword' => null,
                'company_large_category_id' => null,
                'company_middle_category_id' => null,
                'listing_stock_id' => 1,
                'address' => null,
                'created_at' => "{$now->year}-{$now->month}-{$day} 18:00:00",
            ]);
        }
    }
}
