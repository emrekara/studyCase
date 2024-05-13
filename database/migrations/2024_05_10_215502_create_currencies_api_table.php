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
        Schema::create('currencies_api', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Servis');
            $table->string('url')->comment('Servis Url');
            $table->string('type',20)->comment('Tipi (json,xml)');
            $table->integer('status')->default(1)->index()->comment('Durum');
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
        Schema::dropIfExists('currencies_api');
    }
};
