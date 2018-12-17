<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('wishes_lists', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->unsignedInteger('id_user');
             $table->unsignedInteger('id_shoe');
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
        Schema::dropIfExists('wishes_lists');
    }
}
