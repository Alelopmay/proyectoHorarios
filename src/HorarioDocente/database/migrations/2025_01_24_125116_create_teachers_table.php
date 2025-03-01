<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
   public function up()
{
    Schema::create('teachers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category');
        $table->integer('age');
        $table->string('password');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('teachers');
}

}
