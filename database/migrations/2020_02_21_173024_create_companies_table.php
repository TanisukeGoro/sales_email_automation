<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_category_id')->unsigned()->nullable()->comment('業界カテゴリ');
            $table->string('name')->comment('企業名');
            $table->string('code')->nullable()->comment('企業コード');
            $table->string('top_url')->nullable()->comment('Topページ');
            $table->string('form_url')->comment('お問い合わせURL');
            $table->timestamps();

            $table->foreign('company_category_id')->references('id')->on('company_categories');
        });
        // DB::statement("ALTER TABLE companies COMMENT '企業マスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
