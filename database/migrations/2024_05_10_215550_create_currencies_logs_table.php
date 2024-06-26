<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('api_id')->unsigned()->index()->comment('Api Id');
            $table->string('name')->comment('Kur Adı');
            $table->string('code',5)->index()->comment('Kur Kodu');
            $table->string('symbol',5)->comment('Kur Sembol');
            $table->decimal('amount',16)->index()->comment('Kur Tutar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies_logs');
    }
};
