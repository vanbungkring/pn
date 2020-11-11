<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('photo',500)->nullable();
            $table->longText('profile');
            $table->unsignedInteger('daerah_id')->nullable();
            $table->string('facebook',500)->nullable();
            $table->string('twitter',500)->nullable();
            $table->string('instagram',500)->nullable();
            $table->string('youtube',500)->nullable();
            $table->string('gplus',500)->nullable();
            $table->string('website',200)->nullable();
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
        Schema::dropIfExists('anggotas');
    }
}
