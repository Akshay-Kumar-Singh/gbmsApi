<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state');
            $table->integer('consumerno')->unique();
            $table->string('username')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('mobile');
            $table->string('address');
            $table->string('role')->default('user');
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
        Schema::dropIfExists('userdatas');
    }
}
