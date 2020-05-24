<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUriClicksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('uri_clicks', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->text('user_agent')->nullable()->comment('クリックした人の端末情報');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uri_clicks');
    }
}
