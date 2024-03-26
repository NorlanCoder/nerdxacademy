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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('name');
            $table->string('date');
            $table->string('duration');
            $table->string('time');
            $table->string('format');
            $table->string('adress');
            $table->string('language');
            $table->integer('participants');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
