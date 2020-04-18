<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'テスト君',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'company_name' => '任天堂株式会社',
            'company_address' => '京都市南区上鳥羽鉾立町11-1',
            'company_large_category_id' => 1,
            'company_middle_category_id' => 32,
            'n_employees' => 2378,
            'hp_adress' => 'https://www.nintendo.co.jp/index.html',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
