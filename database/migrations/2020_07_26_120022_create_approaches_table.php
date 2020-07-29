<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproachesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('approaches', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->comment('アプローチ中企業');
            $table->bigInteger('approach_folder_id')->comment('アプローチフォルダ');
            $table->integer('phase')->default(0)->comment('営業フェーズ');
            $table->integer('possibility')->default(0)->comment('契約確度');
            $table->string('staff')->nullable()->comment('担当者');
            $table->string('email')->nullable()->comment('担当者メール');
            $table->string('memo')->nullable()->comment('メモ書き');
            $table->timestamps();

            // そのうち進捗管理をユーザー同士で共有したいと言う要望はありそう。
            // 閲覧権限権限用にuer_idテーブルが必要になる？？
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('approach_folder_id')->references('id')->on('approach_folders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approaches');
    }
}
