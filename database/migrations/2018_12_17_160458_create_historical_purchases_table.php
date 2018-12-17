<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricalPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('historical_purchases', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->unsignedInteger('id_user');
             $table->unsignedInteger('id_order');
             $table->foreign('id_user')->on('users')->references('id');
             $table->foreign('id_order')->on('orders')->references('id');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historical_purchases');
    }
}
