<?php

use Illuminate\Database\Seeder;

class MaxSendCountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('max_send_counts')->insert([
            'user_id' => 1,
            'count' => 100,
            'deadline' => '2020-08-31 00:00',
        ]);
    }
}
