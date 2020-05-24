<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaxSendCountsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('max_send_counts', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('count')->comment('最大送信回数');
            $table->timestamp('deadline', 0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_send_counts');
    }
}
