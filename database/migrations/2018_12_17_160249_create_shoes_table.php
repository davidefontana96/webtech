<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('shoes', function (Blueprint $table) {
             $table->increments('id');
             $table->timestamps();
             $table->string('name', 200);
             $table->string('details', 200);
             $table->char('sex',1);
             $table->unsignedInteger('id_category');
             $table->unsignedInteger('id_style');
             $table->unsignedInteger('id_brand');
             $table->unsignedInteger('id_promo');
             $table->unsignedInteger('id_news');
             $table->foreign('id_category')->on('categories')->references('id')->onupdate('cascade');
             $table->foreign('id_style')->on('styles')->references('id')->onupdate('cascade');
             $table->foreign('id_brand')->on('brands')->references('id')->onupdate('cascade');
             $table->foreign('id_promo')->on('promotions')->references('id')->onupdate('cascade');
             $table->foreign('id_news')->on('news')->references('id')->onupdate('cascade');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoes');
    }
}
