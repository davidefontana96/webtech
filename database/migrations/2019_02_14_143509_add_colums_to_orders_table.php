<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
          $table->unsignedInteger('phone_number');
          $table->string('country', 200);
          $table->string('company', 100);
          $table->string('address', 200);
          $table->string('second_address', 200);
          $table->string('city', 100);
          $table->string('province', 100);
          $table->unsignedInteger('postal_code');
        });
    }

    /**
     * Reverse the migrations.
     *          $table->float('price', 10, 2);

     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('phone_number', 12);
            $table->string('country', 200);
            $table->string('company', 100);
            $table->string('address', 200);
            $table->string('second_address', 200);
            $table->string('city', 100);
            $table->string('province', 100);
            $table->integer('postal_code', 10);
        });
    }
}
