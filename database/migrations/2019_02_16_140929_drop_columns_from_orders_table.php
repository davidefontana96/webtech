<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsFromOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
          $table->dropForeign('orders_id_coupon_foreign');
          $table->dropForeign('orders_id_courier_foreign');
          $table->dropColumn(['id_coupon',  'id_courier']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
                        $table->dropForeign('orders_id_coupon_foreign');
                        $table->dropForeign('orders_id_courier_foreign');

            $table->dropColumn(['id_coupon',  'id_courier']);

        });
    }
}
