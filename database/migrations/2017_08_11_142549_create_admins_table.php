<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //  FOR ADMIN
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id'); //ID ADMIN
            $table->string('name');     //NAME ADMIN
            $table->string('email')->unique(); //EMAIL UNIQUE
            $table->string('job_title');    //JOB TITTLE
            $table->string('password'); //PASSWORD
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
        Schema::dropIfExists('admins');
    }
}
