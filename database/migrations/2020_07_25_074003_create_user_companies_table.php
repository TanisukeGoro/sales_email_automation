<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_companies', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('company_name')->comment('企業名')->nullable();
            $table->string('company_profile')->comment('会社概要')->nullable();
            $table->string('company_business_description')->comment('事業内容')->nullable();
            $table->string('representative_name')->comment('代表者名')->nullable();
            $table->string('representative_phone_number')->comment('代表者電話番号')->nullable();
            $table->bigInteger('company_large_category_id')->unsigned()->nullable()->comment('日本標準産業分類の大分類');
            $table->bigInteger('company_middle_category_id')->unsigned()->nullable()->comment('日本標準産業分類の中分類');
            $table->string('company_address')->comment('企業住所')->nullable();
            $table->integer('maximum_employees')->comment('従業員人数')->nullable();
            $table->string('hp_url')->comment('ホームページurl')->nullable();
            $table->string('contact_email')->comment('お問い合わせメールアドレス')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_large_category_id')->references('id')->on('company_large_categories');
            $table->foreign('company_middle_category_id')->references('id')->on('company_middle_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_companies');
    }
}