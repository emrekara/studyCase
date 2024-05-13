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
        Schema::table('currencies_api', function (Blueprint $table) {
            //
            $table->string('data_name')->after('var_path')->comment('Data Name Field');
            $table->string('data_price')->after('data_name')->comment('Data Price Field');
            $table->string('data_symbol')->after('data_price')->comment('Data Symbol Field');
            $table->string('data_shortCode')->after('data_symbol')->comment('Data Short Code Field');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies_api', function (Blueprint $table) {
            //
        });
    }
};
