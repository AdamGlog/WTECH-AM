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
        Schema::create('produkt_obrazky', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produkt_id')->constrained('produkty')->onDelete('cascade');
            $table->string('cesta', 255);
            $table->boolean('hlavny')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkt_obrazky');
    }
};
