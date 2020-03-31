<?php

use Illuminate\Database\Seeder;

class RedirectUrisTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('redirect_uris')->insert([
      "user_id" => 1,
      "uri" => "https://github.com/TanisukeGoro/sales_email_automation",
    ]);
  }
}
