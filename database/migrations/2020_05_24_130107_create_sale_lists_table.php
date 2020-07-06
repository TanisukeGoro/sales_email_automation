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
            $table->string('freeword')->nullable()->comment('フリーワード');
            $table->bigInteger('company_large_category_id')->unsigned()->nullable()->comment('日本標準産業分類の大分類');
            $table->bigInteger('company_middle_category_id')->unsigned()->nullable()->comment('日本標準産業分類の中分類');
            $table->integer('listing_stock_id')->unsigned()->nullable()->comment('上場状態');
            $table->string('address')->nullable()->comment('所在地');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('listing_stock_id')->references('id')->on('listing_stocks');
            $table->foreign('company_large_category_id')->references('id')->on('company_large_categories');
            $table->foreign('company_middle_category_id')->references('id')->on('company_middle_categories');
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
