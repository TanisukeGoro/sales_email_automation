<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name')->comment('企業名');
            $table->string('code')->nullable()->comment('企業コード');
            $table->integer('listing_stock_id')->comment('上場状態');
            $table->bigInteger('company_category_id')->unsigned()->nullable()->comment('業界カテゴリ');
            $table->string('address')->comment('企業住所')->nullable();
            $table->integer('n_employees')->comment('従業員人数')->nullable();
            $table->string('top_url')->nullable()->comment('Topページ');
            $table->string('form_url')->comment('お問い合わせURL');
            $table->timestamps();

            $table->foreign('company_category_id')->references('id')->on('company_categories');
        });
        // DB::statement("ALTER TABLE companies COMMENT '企業マスタ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
}
