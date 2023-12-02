<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class user extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('email', 30);
            $table->string('departament', 100);
            $table->string('phone', 10);
            $table->boolean('status');
            $table->string('password', 255);
            $table->rememberToken();
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}

