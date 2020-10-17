<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('official_position')->comment('役職')->nullable();
            $table->string('facebook')->comment('facebook')->nullable();
            $table->string('linkedin')->comment('linkedin')->nullable();
            $table->bigInteger('plan_id')->unsigned()->nullable();
            $table->string('company_name')->comment('企業名')->nullable();
            $table->bigInteger('company_large_category_id')->unsigned()->nullable()->comment('日本標準産業分類の大分類');
            $table->bigInteger('company_middle_category_id')->unsigned()->nullable()->comment('日本標準産業分類の中分類');
            $table->string('company_address')->comment('企業住所')->nullable();
            $table->integer('maximum_employees')->comment('従業員人数')->nullable();
            $table->string('hp_adress')->comment('ホームページアドレス')->nullable();
            $table->string('business_description')->comment('事業内容')->nullable();
            $table->string('company_representative_name')->comment('代表者名')->nullable();
            $table->string('company_representative_phone_number')->comment('代表者電話番号')->nullable();
            $table->string('company_profile')->comment('会社概要')->nullable();
            $table->string('company_contact_email')->comment('問い合わせメール')->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->foreign('company_large_category_id')->references('id')->on('company_large_categories');
            $table->foreign('company_middle_category_id')->references('id')->on('company_middle_categories');
            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
