<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->unsignedBigInteger('type_id');
            $table->string('size_title', 255);
            $table->text('description');
            $table->decimal('price', 5, 2); // is viso 5 skaiciai, is kuriu du po kablelio
            $table->decimal('discount', 5, 2)->nullable(); // gali buti discount'as arba bu null
            $table->string('photo', 255);
            $table->smallInteger('priority');
            $table->unsignedBigInteger('group_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('group_id')->references('id')->on('groupes');
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
        Schema::dropIfExists('products');
    }
}
