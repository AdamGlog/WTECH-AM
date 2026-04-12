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
        ['uroven' => 'bronze'],
        ['uroven' => 'silver'],
        ['uroven' => 'gold'],
        ['uroven' => 'diamant'],
        ['uroven' => 'netherite'],
        ['uroven' => 'admin']
        ]);
    }
}
