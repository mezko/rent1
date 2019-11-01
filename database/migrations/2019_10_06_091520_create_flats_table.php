<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->bigIncrements('f_id');

            // $table->string('area');
            $table->string('ar_name');
            $table->string('en_name');
            $table->integer('price');
            $table->string('type');
            $table->string('address');
            $table->string('info');
            $table->integer('area');
            $table->integer('room');
            $table->integer('bath');
            $table->string('img');
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('cities')->onUpdate('cascade');


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
        Schema::dropIfExists('flats');
    }
}
