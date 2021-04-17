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
        Schema::create('order__details', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('OrderId')->unsigned();
            $table->foreign('OrderId')->references('id')->on('Orders')->onDelete('cascade');
            $table->integer('ProductId')->unsigned();
            $table->foreign('ProductId')->references('id')->on('Products')->onDelete('cascade');
            $table->Integer("Quantity");
            $table->double("UnitPrice");
            $table->date("AddDate");
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
        Schema::dropIfExists('order__details');
    }
}
