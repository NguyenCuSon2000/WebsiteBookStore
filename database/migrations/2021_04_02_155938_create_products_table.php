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
            $table->Increments('id');
            $table->string('ProductName');
            $table->string('Description');
            $table->string('Picture')->nullable();
            $table->double('Price')->nullable();
            $table->integer("Quantity")->default(0);
            $table->Integer('Status')->default(1);
            $table->integer('Cate_Id')->unsigned();
            $table->foreign('Cate_Id')->references('id')->on('category_products')->onDelete('cascade');
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
