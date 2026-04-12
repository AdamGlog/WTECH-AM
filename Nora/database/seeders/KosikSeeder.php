<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KosikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kosik')->insert([
        ['pouzivatel_id' => 1, 'posledny_update' => '2026-03-01'],
        ['pouzivatel_id' => 2, 'posledny_update' => '2026-03-05'],
        ]);

        DB::table('kosik_polozka')->insert([
            ['kosik_id' => 1, 'produkt_id' => 1, 'pocet_ks' => 2],
            ['kosik_id' => 1, 'produkt_id' => 3, 'pocet_ks' => 1],
            ['kosik_id' => 2, 'produkt_id' => 2, 'pocet_ks' => 1],
        ]);
    }
}
