<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
       {
           Schema::create('orders', function (Blueprint $table) {
               $table->increments('id');
               $table->timestamps();
               $table->date('shipping_day');
               $table->date('expected_arrival');
               $table->float('total',10 ,2);
               $table->unsignedInteger('id_courier');
               $table->unsignedInteger('id_coupon');
               $table->unsignedInteger('id_user');
               $table->foreign('id_courier')->on('couriers')->references('id');
               $table->foreign('id_coupon')->on('coupons')->references('id');
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
        Schema::dropIfExists('orders');
    }
}
