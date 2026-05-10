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
        Schema::create('objednavka_polozka', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('objednavky');
            $table->foreignId('product_id')->constrained('produkty')->onDelete('cascade');
            $table->integer('pocet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objednavka_polozka');
    }
};
