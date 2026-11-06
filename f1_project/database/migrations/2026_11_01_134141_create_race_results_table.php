<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->unsignedInteger('did');
            $table->integer('pos')->nullable();
            $table->string('error')->nullable();
            $table->string('team')->nullable();
            $table->string('type');
            $table->string('engine');

            $table->foreign('did')->references('id')->on('drivers')->cascadeOnDelete();
            $table->foreign('date')->references('date')->on('gps')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
