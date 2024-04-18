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
        Schema::create('risk_assesments', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('username');
            $table->string('age');
            $table->string('weight');
            $table->string('height');
            $table->string('pressure');
            $table->string('sugar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_assesments');
    }
};
