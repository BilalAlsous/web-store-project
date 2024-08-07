<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('user_id')->index();
        $table->foreign('user_id')->references('id')->on('users');
        $table->string('status')->default("waiting");
        $table->string('total_price');
        $table->string('address');
        $table->string('phone');
        $table->string('email');
        $table->string('name');
        $table->string('city');
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
        Schema::dropIfExists('orders');
    }
}
