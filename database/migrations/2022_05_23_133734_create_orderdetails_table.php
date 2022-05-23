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
            $table->timestamps();
            $table->unsignedBigInteger('detail_order_id');
            $table->unsignedBigInteger('detail_product_id');
            $table->foreign('detail_order_id')->references('id')->on('orders')->onDelete('cascade'); //onDelete('cascade') xóa tham chiếu 
            $table->foreign('detail_product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('detail_name');
            $table->float('detail_price');
            $table->string('detail_SKU');
            $table->integer('detail_quantity');
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
