<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('memberships', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->unsignedInteger('id_user');
             $table->unsignedInteger('id_group');
             $table->foreign('id_user')->on('users')->references('id');
             $table->foreign('id_group')->on('groups')->references('id');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
