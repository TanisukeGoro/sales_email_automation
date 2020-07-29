<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name')->comment('プラン名');
            $table->unsignedInteger('price')->comment('価格');
            $table->unsignedInteger('send_limit')->comment('送信回数上限');
            $table->float('termination')->comment('契約期間');

            //uri_click template_id company_id  sent_data string

            // url redirect_url

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
}
