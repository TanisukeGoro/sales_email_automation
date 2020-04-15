<?php

use Illuminate\Database\Seeder;

class SendCountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('send_counts')->insert([
            'user_id' => 1,
            'count' => 600,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
