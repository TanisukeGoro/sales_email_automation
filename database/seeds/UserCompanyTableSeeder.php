<?php

use Illuminate\Database\Seeder;

class UserCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_companies')->insert([
            'user_id' => 1,
            'company_name' => '任天堂株式会社',
            'company_profile' => '今日設立',
            'company_business_description' => '受託',
            'representative_name' => '岡村',
            'representative_phone_number' => '09033333333',
            'company_address' => '京都市南区上鳥羽鉾立町11-1',
            'company_large_category_id' => 1,
            'company_middle_category_id' => 32,
            'maximum_employees' => 2378,
            'hp_url' => 'https://www.nintendo.co.jp/index.html',
            'contact_email' => 'hello@gmail.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
