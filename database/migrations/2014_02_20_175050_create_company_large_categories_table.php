<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyLargeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_large_categories', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name')->comment('日本標準産業分類の大分類');
            $table->string('code')->comment('カテゴリコード');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_large_categories');
    }
}
