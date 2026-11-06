<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email');
            $table->string('subject', 150);
            $table->text('message');
            $table->timestamps(); // created_at = küldés ideje (az Üzenetek menühöz kell majd)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};