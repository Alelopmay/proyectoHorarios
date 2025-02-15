<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesTable extends Migration
{
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();  // Esto crea un campo 'id' auto incremental
            $table->string('name', 100);  // Nombre del instituto
            $table->string('address', 255);  // Dirección del instituto
            $table->timestamps();  // Marca las fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('institutes');
    }
}
