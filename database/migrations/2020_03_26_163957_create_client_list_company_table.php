<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientListCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_list_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('client_list_id')->unsigned();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('client_list_id')->references('id')->on('client_lists');
        });
        // DB::statement("ALTER TABLE client_list_company COMMENT '営業先リスト_企業マスタ中間テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_list_company');
    }
}
