<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablishCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establish_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText("p_ar")->nullable();
            $table->longText("p_en")->nullable();
            $table->integer("ar_state")->default(0);
            $table->integer("en_state")->default(0);
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
        Schema::dropIfExists('establish_companies');
    }
}
