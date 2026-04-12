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
        Schema::create('pouzivatelia', function (Blueprint $table) {
            $table->id();
            $table->string('profilovka_url', 255)->nullable();
            $table->string('meno', 20);
            $table->string('priezvisko', 20);
            $table->string('telefonne_cislo', 20)->nullable();
            $table->string('email', 30)->unique();
            $table->date('datum_registracie');
            $table->foreignId('typ_clena')->constrained('urovne_clenov');
            $table->string('nickname', 30)->nullable();
            $table->string('ulica', 20)->nullable();
            $table->string('cislo_domu', 10)->nullable();
            $table->foreignId('mesto_psc')->nullable()->constrained('mesta_s_psc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pouzivatelia');
    }
};
