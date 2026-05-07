<?php

namespace Database\Seeders;

use App\Enums\StavObjednavky;
use App\Enums\TypDorucenia;
use App\Enums\TypPlatby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('objednavky')->insert([
        ['user_id' => 1, 'typ_platby' => TypPlatby::PREVOD->value, 'stav' => StavObjednavky::ZRUSENA->value, 'typ_dorucenia' => TypDorucenia::KURIER->value, 'celkova_cena' => 40.12, 'adresa_dorucenia' => 'petrzalska 24 810 10 Bratislava', 'datum_objednania' => '2026-02-03'],
        ['user_id' => 3, 'typ_platby' => TypPlatby::DOBIERKA->value, 'stav' => StavObjednavky::DORUCENA->value, 'typ_dorucenia' => TypDorucenia::OSOBNY_ODBER->value, 'celkova_cena' => 10.99, 'adresa_dorucenia' => 'kosicka 11 811 01 Zilina', 'datum_objednania' => '2026-03-12'],
        ['user_id' => 5, 'typ_platby' => TypPlatby::PREVOD->value, 'stav' => StavObjednavky::DORUCENA->value, 'typ_dorucenia' => TypDorucenia::KURIER->value, 'celkova_cena' => 49.99, 'adresa_dorucenia' => 'Kvetna 33 417 51 Poprad', 'datum_objednania' => '2026-03-15'],
        ['user_id' => 3, 'typ_platby' => TypPlatby::KARTA->value, 'stav' => StavObjednavky::DORUCENA->value, 'typ_dorucenia' => TypDorucenia::OSOBNY_ODBER->value, 'celkova_cena' => 39.98, 'adresa_dorucenia' => 'Stolova 41 279 01 Topolcany', 'datum_objednania' => '2026-04-01'],
        ['user_id' => 3, 'typ_platby' => TypPlatby::PREVOD->value, 'stav' => StavObjednavky::ODOSLANA->value, 'typ_dorucenia' => TypDorucenia::OSOBNY_ODBER->value, 'celkova_cena' => 78.97, 'adresa_dorucenia' => 'Ursinska 11 210 02 Banska Bystrica', 'datum_objednania' => '2026-04-16'],
        ['user_id' => 7, 'typ_platby' => TypPlatby::KARTA->value, 'stav' => StavObjednavky::SPRACOVAVANA->value, 'typ_dorucenia' => TypDorucenia::POSTA->value, 'celkova_cena' => 44.96, 'adresa_dorucenia' => 'Tehelna 10 041 01 Skalica', 'datum_objednania' => '2026-05-02'],
        ['user_id' => 6, 'typ_platby' => TypPlatby::DOBIERKA->value, 'stav' => StavObjednavky::NOVA->value, 'typ_dorucenia' => TypDorucenia::KURIER->value, 'celkova_cena' => 59.99, 'adresa_dorucenia' => 'Letna 77 026 01 Dolny Kubin', 'datum_objednania' => '2026-05-04']
        ]);

        DB::table('objednavka_polozka')->insert([
        ['order_id' => 1, 'product_id' => 14, 'pocet' => 2],
        ['order_id' => 1, 'product_id' => 7, 'pocet' => 1],
        ['order_id' => 2, 'product_id' => 27, 'pocet' => 4],
        ['order_id' => 2, 'product_id' => 30, 'pocet' => 3],
        ['order_id' => 3, 'product_id' => 11, 'pocet' => 1],
        ['order_id' => 4, 'product_id' => 6, 'pocet' => 2],
        ['order_id' => 4, 'product_id' => 7, 'pocet' => 1],
        ['order_id' => 4, 'product_id' => 4, 'pocet' => 1],
        ['order_id' => 5, 'product_id' => 12, 'pocet' => 4],
        ['order_id' => 6, 'product_id' => 28, 'pocet' => 1],
        ['order_id' => 7, 'product_id' => 19, 'pocet' => 2],
        ]);
    }
}
