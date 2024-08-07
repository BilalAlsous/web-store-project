<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TempProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('quantity')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('discount_price')->nullable();
            $table->text('description')->nullable();
            $table->text('imgpath')->nullable();
            $table->unsignedInteger('catid')->index();
            $table->foreign('catid')->references('id')->on('categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
