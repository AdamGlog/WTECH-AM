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
        Schema::create('produkty', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategoria_id')->constrained('kategoria');
            $table->string('meno', 255);
            $table->text('popis')->nullable();
            $table->float('cena');
            $table->text('info')->nullable();
            $table->text('doplnkove_info')->nullable();
            $table->integer('pocet_na_sklade')->default(0);
            $table->float('hodnotenie')->nullable();
            $table->string('obrazok', 30);
            $table->string('typ', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkty');
    }
};
