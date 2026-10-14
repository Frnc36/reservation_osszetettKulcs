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
        Schema::create('travel', function (Blueprint $table) {
            //$table->id(); //Töröld ki az $table->id(); sort! Mivel nem egyetlen önálló id oszlopod lesz, erre nincs szükség.
            $table->foreignId('flight_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('evaluation');
            $table->timestamps();
            $table->primary(['flight_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel');
    }
};
