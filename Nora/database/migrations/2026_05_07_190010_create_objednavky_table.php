<?php

use App\Enums\StavObjednavky;
use App\Enums\TypDorucenia;
use App\Enums\TypPlatby;
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
        Schema::create('objednavky', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('pouzivatelia');
            $table->enum('typ_platby', array_column(TypPlatby::cases(), 'value'));
            $table->enum('stav', array_column(StavObjednavky::cases(), 'value'))->default(StavObjednavky::NOVA->value);
            $table->enum('typ_dorucenia', array_column(TypDorucenia::cases(), 'value'));
            $table->decimal('celkova_cena', 12, 2);
            $table->text('adresa_dorucenia');
            $table->timestamp('datum_objednania')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objednavky');
    }
};
