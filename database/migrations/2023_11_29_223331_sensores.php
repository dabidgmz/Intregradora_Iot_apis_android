<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class sensores extends Migration
{
    public function up()
    {
        Schema::create('sensores', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_sensor', 100);
            $table->string('nombre_sensor', 100);
            $table->date('fecha_registro');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('sensores');
    }
}
