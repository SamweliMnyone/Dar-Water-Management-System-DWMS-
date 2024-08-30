<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('location')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('dii', ['1', '2', '3', '4']);
            $table->integer('engineer_id');
            $table->string('engineer_pdf');
            $table->integer('mttr');
            $table->integer('mwt');
            $table->string('tech_pdf')->nullable();
            $table->enum('status', ['new','pending', 'complete', 'approved', 'failed'])->default('new');
            $table->integer('tech_id')->nullable();
            $table->dateTime('creation_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('starting_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintanance');
    }
};
