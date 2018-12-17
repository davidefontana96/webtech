<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('couriers', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->string('name');
             $table->string('partita_iva');
             $table->string('registered_office');
             $table->unsignedInteger('phone_number');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('couriers');
    }
}
