<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaerahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daerahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title',200);
            $table->longText('profile');            
            $table->string('background',255);
            $table->unsignedInteger('ketua_id');
            $table->string('alamat',500)->nullable();
            $table->string('telepon',50)->nullable();
            $table->string('facebook',500)->nullable();
            $table->string('twitter',500)->nullable();
            $table->string('instagram',500)->nullable();
            $table->string('youtube',500)->nullable();
            $table->string('gplus',500)->nullable();
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
        Schema::dropIfExists('daerahs');
    }
}
