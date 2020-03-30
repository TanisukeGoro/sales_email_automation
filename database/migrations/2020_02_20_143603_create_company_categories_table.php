<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_categories', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name')->comment('業界名');
            $table->string('code')->comment('カテゴリコード');
            $table->timestamps();
        });

        // DB::statement("ALTER TABLE company_categories COMMENT '業界カテゴリマスタ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_categories');
    }
}
