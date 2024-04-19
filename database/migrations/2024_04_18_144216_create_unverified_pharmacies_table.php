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
        Schema::create('unverified_pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('pharmacyName');
            $table->string('street');
            $table->string('region');
            $table->string('city');
            $table->string('contact');
            $table->string('pharmacyEmail')->nullable();
            $table->string('certification');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unverified_pharmacies');
    }
};
