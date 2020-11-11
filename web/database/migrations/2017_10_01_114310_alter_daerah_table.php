<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDaerahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daerahs', function (Blueprint $table) {
            $table->string('headline');
            $table->string('url',500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daerahs', function (Blueprint $table) {
            $table->dropColumn('headline');
            $table->dropColumn('url');
        });
    }
}
