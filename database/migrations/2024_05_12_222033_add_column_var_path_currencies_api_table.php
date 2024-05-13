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
            $table->string('var_path')->nullable()->after('type')->comment('Var Path');
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
            $table->dropColumn('var_path');
        });
    }
};
