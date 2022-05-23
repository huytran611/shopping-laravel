<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('order_user_id');
            $table->foreign('order_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('order_amount');    //SL order hàng
            $table->string('order_ship_name');
            $table->string('order_ship_address');
            $table->string('order_ship_address2');
            $table->string('order_city');
            $table->string('order_state');
            $table->string('order_zip');
            $table->string('order_country');
            $table->string('order_phone');
            $table->string('order_fax');
            $table->float('order_shipping');// phí ship
            $table->float('orderfax');
            $table->string('order_email');
            $table->dateTime('order_date');
            $table->tinyInteger('order_shipped');
            $table->string('order_tracking_number'); //mã đơn ship
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
};
