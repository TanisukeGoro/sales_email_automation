<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproachFoldersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('approach_folders', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->comment('ユーザー');
            $table->string('title', 30)->unique()->comment('タイトル'));
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approach_folders');
    }
}
