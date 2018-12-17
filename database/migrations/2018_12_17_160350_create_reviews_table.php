<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('reviews', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->string('text');
             $table->unsignedInteger('id_shoe');
             $table->unsignedInteger('id_user');
             $table->foreign('id_shoe')->on('shoes')->references('id');
             $table->foreign('id_user')->on('users')->references('id');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
