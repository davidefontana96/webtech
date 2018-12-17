<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('credit_cards', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             //$table->date('validity');
             $table->integer('cvv');
             $table->integer('front_code');
             $table->unsignedInteger('id_user');
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
        Schema::dropIfExists('credit_cards');
    }
}
