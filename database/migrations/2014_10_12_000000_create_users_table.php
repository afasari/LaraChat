<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table users used for role user
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');   //id user
            $table->string('name');     //name user
            $table->string('email')->unique();  //email must be unique. they can't multi
            $table->string('password');     //password will be encrypted
            $table->rememberToken();    //token
            $table->timestamps();   //created and updated
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
