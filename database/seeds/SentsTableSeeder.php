<?php

use Illuminate\Database\Seeder;

class SentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('sents')->insert([
      'user_id' => 1,
      "count" => 5,
      "status" => "完了"
    ]);
  }
}
