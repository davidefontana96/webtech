<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('images', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->string('description');
             $table->string('path',200);
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
        Schema::dropIfExists('images');
    }
}
