<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoria')->insert([
        ['meno' => 'Hry', 'pocet_produktov' => 10],
        ['meno' => 'Konzoly', 'pocet_produktov' => 20],
        ['meno' => 'Merch', 'pocet_produktov' => 30],
        ['meno' => 'Figúrky', 'pocet_produktov' => 40],
        ]);
    }
}
