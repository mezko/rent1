<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messagemai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagemail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("mail");
            $table->string("message");
            $table->integer("role")->default(0);
            $table->string("reply")->nullable();
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
        Schema::dropIfExists('messagemail');
    }
}
