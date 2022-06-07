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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('order_id')->unsigned();
            $table->BigInteger('product_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); //onDelete('cascade') xóa tham chiếu 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->float('detail_price');
            $table->integer('detail_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
};
