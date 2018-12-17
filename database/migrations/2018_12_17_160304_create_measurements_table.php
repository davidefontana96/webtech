<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('measurements', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->unsignedInteger('size_shoe');
             $table->unsignedInteger('element');
             $table->unsignedInteger('id_shoe');
             $table->foreign('id_shoe')->on('shoes')->references('id');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}
