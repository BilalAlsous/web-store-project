<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        // $table->string('slug');
        $table->text('description')->nullable();
        // $table->tinyInteger('status')->default('0')->nullable();
        // $table->tinyInteger('popular')->default('0')->nullable();
        // $table->string('meta_title');
        // $table->string('meta_descrip');
        // $table->string('meta_keywords');
        $table->string('imgpath',255)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
