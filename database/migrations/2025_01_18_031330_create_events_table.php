<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}

