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
        Schema::create('pharmacy_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_address');
            $table->string('pharmacyName');
            $table->string('medicineName');
            $table->string('medicineCategory');
            $table->decimal('medicinePrice', 8, 2);
            $table->string('pharmacyLocation')->nullable();
            $table->string('prescription'); // Path to the uploaded prescription file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_orders');
    }
};
