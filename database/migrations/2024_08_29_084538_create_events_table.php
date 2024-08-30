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
            $table->string('title');
            $table->text('description')->nullable(); // Make description nullable if it’s optional
            $table->timestamp('start');
            $table->timestamp('end')->nullable(); // Allow end to be nullable
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
