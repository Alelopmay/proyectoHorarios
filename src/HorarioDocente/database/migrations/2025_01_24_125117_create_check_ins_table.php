<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckInsTable extends Migration
{
    public function up()
    {
        Schema::create('check_ins', function (Blueprint $table) {
            $table->id();
            $table->dateTime('entry_date');
            $table->dateTime('exit_date')->nullable();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('check_ins');
    }
}
;
