<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('type');
            $table->string('street', 255)->nullable();
            $table->string('house', 255)->nullable();
            $table->string('flat', 255)->nullable();
            $table->string('laiptine', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('comments', 255)->nullable();
            $table->unsignedBigInteger('pickup_id');
            $table->foreign('pickup_id')->references('id')->on('pickups');
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
        Schema::dropIfExists('clients');
    }
}
