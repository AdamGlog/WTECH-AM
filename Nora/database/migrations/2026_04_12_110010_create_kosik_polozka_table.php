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
        Schema::create('kosik_polozka', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kosik_id')->constrained('kosik')->onDelete('cascade');
            $table->foreignId('produkt_id')->constrained('produkty');
            $table->integer('pocet_ks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosik_polozka');
    }
};
