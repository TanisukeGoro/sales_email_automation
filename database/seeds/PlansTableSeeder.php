<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = ['standard', 'premia'];
        $price = [1500, 3000];
        $send_limit = [500, 1500];
        $termination = [30, 5, 30, 5];

        foreach ($name as $key => $value) {
            DB::table('plans')->insert([
                'name' => $value,
                'price' => $price[$key],
                'send_limit' => $send_limit[$key],
                'termination' => $termination[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
