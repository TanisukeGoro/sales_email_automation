<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now('Asia/Tokyo');

        $days = [1, 10, 15, 20, 25];

        foreach ($days as $key => $day) {
            DB::table('sents')->insert([
                'user_id' => 1,
                'company_id' => 2,
                'status' => '完了',
                'created_at' => "{$now->year}-{$now->month}-{$day} 18:00:00",
            ]);
        }
    }
}
