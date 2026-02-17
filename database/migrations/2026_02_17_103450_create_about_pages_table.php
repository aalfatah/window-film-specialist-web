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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('Profil Perusahaan');
            $table->string('subheading')->nullable();
            $table->text('description')->nullable();
            $table->string('main_image')->nullable();
            
            // Section Visi Misi
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            
            // Section Why Choose Us (Mengapa Kami) - Disimpan sebagai JSON
            $table->json('values')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
