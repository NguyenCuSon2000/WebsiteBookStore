<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
<<<<<<< HEAD
            $table->string('email');
=======
>>>>>>> 22e96a38382caf5c8e9bfd0543d910f6065af5d5
            $table->integer('role_id')->unsigned()->default(2);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->integer('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
