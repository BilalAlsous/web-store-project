<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('order_id')->index();
        $table->foreign('order_id')->references('id')->on('orders');
        $table->unsignedInteger('product_id')->index();
        $table->foreign('product_id')->references('id')->on('products');
        $table->integer('quantity');
        $table->decimal('price')->nullable();
        $table->decimal('discount')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
