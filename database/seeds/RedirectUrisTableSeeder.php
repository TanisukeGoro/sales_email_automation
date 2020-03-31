<?php

use Illuminate\Database\Seeder;

class RedirectUrisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('redirect_uris')->insert([
            'user_id' => 1,
            'uri' => 'https://github.com/TanisukeGoro/sales_email_automation',
        ]);
    }
}
