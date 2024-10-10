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
        Schema::create('brons', function (Blueprint $table) {
           $table->id();
           $table->dateTime('date_time_szapisi');
           $table->date('date_zaezda');
           $table->enum('statysBroni', ['Подтверждена', 'Не подтверждена']);
           $table->foreignId('user_id')->constrained('user')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brons');
    }
};
