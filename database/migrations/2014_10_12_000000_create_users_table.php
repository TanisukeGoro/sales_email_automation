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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('company_name')->comment('企業名')->nullable();
            $table->bigInteger('company_large_category_id')->unsigned()->nullable()->comment('日本標準産業分類の大分類');
            $table->bigInteger('company_middle_category_id')->unsigned()->nullable()->comment('日本標準産業分類の中分類');
            $table->string('company_address')->comment('企業住所')->nullable();
            $table->integer('n_employees')->comment('従業員人数')->nullable();
            $table->string('hp_adress')->comment('ホームページアドレス')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('company_large_category_id')->references('id')->on('company_large_categories');
            $table->foreign('company_middle_category_id')->references('id')->on('company_middle_categories');
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
