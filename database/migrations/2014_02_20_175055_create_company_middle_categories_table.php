<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyMiddleCategoriesTable extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        Schema::create('company_middle_categories', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('company_large_category_id')->unsigned()->nullable()->comment('大分類 ID');
            $table->string('name')->comment('日本標準産業分類の中分類');
            $table->string('code')->comment('カテゴリコード');

            $table->foreign('company_large_category_id')->references('id')->on('company_large_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_middle_categories');
    }
}
