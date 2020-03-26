<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companiy_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('業界名');
            $table->string('code')->comment('カテゴリコード');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE companiy_categories COMMENT '業界カテゴリマスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companiy_categories');
    }
}
