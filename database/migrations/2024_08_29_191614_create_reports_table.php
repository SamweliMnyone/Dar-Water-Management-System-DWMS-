<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('region');
            $table->string('ward');
            $table->string('description');
            $table->date('start');
            $table->date('finish');
            $table->text('explproblem');
            $table->text('labour');
            $table->decimal('labour_cost', 8, 2);
            $table->text('tools');
            $table->decimal('tools_cost', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
