<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('users', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->string('name');
             $table->string('surname')->default('uknown');
             $table->string('email');
             $table->string('password');
             $table->string('address')->default('uknown');
             $table->rememberToken();
             $table->timestamp('email_verified_at')->nullable();
             $table->string('activation_code')->nullable();
      });

     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
