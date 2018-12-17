<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('news', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->string('title');
             $table->string('text');
             $table->unsignedInteger('id_user');
             $table->foreign('id_user')->references('id')->on('users');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
