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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->constrained('partners')->cascadeOnDelete();
            $table->string('name'); // Contoh: Crystalline, Black Beauty
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable(); // Foto roll kaca film/mobil contoh
            $table->json('features')->nullable(); 
            // Struktur: [{ "type": "20%", "vlt": "19", "irr": "99", "uvr": "99", "tser": "60" }]
            $table->json('specifications')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
