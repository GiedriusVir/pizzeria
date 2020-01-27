<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIngridientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ingridients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ingridient_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('ingridient_id')->references('id')->on('ingridients');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_ingridients');
    }
}
