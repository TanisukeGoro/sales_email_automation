<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('templates', function (Blueprint $table): void {
      $table->bigIncrements('id');
      $table->bigInteger('user_id')->unsigned();
      $table->string('name')->comment('テンプレート名');
      $table->string('email')->comment('メールアドレス');
      $table->string('subject')->comment('件名');
      $table->string('company')->comment('会社名');
      $table->string('department')->comment('部署名');
      $table->longText('long_content')->comment('1000文字以下のお問い合わせ内容');
      $table->longText('short_content')->comment('200字以下のお問い合わせ内容');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
    });
    // DB::statement("ALTER TABLE templates COMMENT '文章テンプレート'");
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('templates');
  }
}
