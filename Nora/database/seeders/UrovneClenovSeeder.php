<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrovneClenovSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('urovne_clenov')->insert([
        ['uroven' => 'Copper'],
        ['uroven' => 'Iron'],
        ['uroven' => 'Gold'],
        ['uroven' => 'Diamant'],
        ['uroven' => 'Netherite']
        ]);
    }
}
