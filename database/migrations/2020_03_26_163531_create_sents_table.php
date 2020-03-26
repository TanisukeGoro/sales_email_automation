<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('count')->comment('送信回数');
            $table->string('status')->comment('何かの状態');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        DB::statement("ALTER TABLE sents COMMENT 'ユーザーの送信回数カウント'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sents');
    }
}
