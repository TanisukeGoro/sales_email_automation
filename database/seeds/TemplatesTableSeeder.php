<?php

use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    for ($i = 0; $i <= 10; $i++) {
      DB::table('templates')->insert([
        'user_id' => 1,
        'name' => '営業メール',
        'email' => 'admin@argon.com',
        'subject' => '新規サービスのご紹介に関する面談のお願い（任天堂株式会社）',
        'company' => '豊田株式会社',
        'department' => '総務部',
        'long_content' => 'いつも大変お世話になっております。
      株式会社△△の▲▲です。
      先日の■■の件では、お電話のお時間をいただき、誠にありがとうございました。

      この度は、先日お伺いした貴社の「チーム内におけるメール管理の課題」について、
      弊社が運営する□□というサービスの導入によって解決のお手伝いができるかと思い、
      ご連絡を差し上げました。

      もしよろしければ、直接お伺いしてご説明させていただきたいのですが、
      下記日時のご都合はいかがでしょうか？
      当日は、サービス内容の詳細や導入事例、
      活用イメージなどを具体的にお話しできればと考えております。

      －－－－－－－－－－－－－－－－
      ・◯月×日（□） △時
      ・◯月×日（□） △時
      ・◯月×日（□） △時
      －－－－－－－－－－－－－－－－

      時間は1時間程度を予定しております。

      上記日程で差し支えなければ、
      お手数ですが、ご都合のいい日程をお知らせいただければ幸いです。

      ご多忙の折、大変恐縮ですが、何卒よろしくお願い申し上げます。',

        'short_content' => 'いつも大変お世話になっております。
      株式会社△△の▲▲です。
      先日の■■の件では、お電話のお時間をいただき、誠にありがとうございました。

      この度は、先日お伺いした貴社の「チーム内におけるメール管理の課題」について、
      弊社が運営する□□というサービスの導入によって解決のお手伝いができるかと思い、
      ご連絡を差し上げました。

      もしよろしければ、直接お伺いしてご説明させていただきたいです。',
      ]);
    }
  }
}
