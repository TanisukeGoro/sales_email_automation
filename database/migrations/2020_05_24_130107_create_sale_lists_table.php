<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleListsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_lists', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->comment('ユーザーID');
            $table->string('name')->comment('検索条件名');
            $table->string('freeword')->comment('フリーワード');
            $table->string('company_large_category_id')->comment('業種大カテゴリ');
            $table->string('company_middle_category_id')->comment('業種中カテゴリ');
            $table->string('address')->comment('所在地');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_lists');
    }
}
