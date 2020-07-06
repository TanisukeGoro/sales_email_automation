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
            $table->bigInteger('template_id');
            $table->bigInteger('company_id');
            $table->text('user_agent')->nullable()->comment('クリックした人の端末情報');
            $table->text('sent_data')->comment('送信したフォーム内容をjson形式で保存');
            $table->timestamps();

            $table->foreign('template_id')->references('id')->on('templates');
            $table->foreign('company_id')->references('id')->on('companies');
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
