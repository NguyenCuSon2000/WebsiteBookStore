<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer("Product_Id")->unsigned();
            $table->foreign("Product_Id")->references("id")->on("products")->onDelete('cascade');
            $table->integer("Percent");
            $table->double("Promotion_price")->null();
            $table->integer("Status")->default(1);
            $table->date("BeginDate");
            $table->date("EndDate");
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
        Schema::dropIfExists('discounts');
    }
}
