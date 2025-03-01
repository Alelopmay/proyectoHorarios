<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('teacher_id');
    $table->string('day', 10);
    $table->time('start_time');
    $table->time('end_time');
    $table->timestamps();

    $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
});

    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
