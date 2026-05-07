<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRole;

class PouzivateliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pouzivatelia')->insert([
        [
            'meno' => 'Adam',
            'priezvisko' => 'Glog',
            'heslo' => Hash::make('1234'),
            'email' => 'adamko@gmail.com',
            'telefonne_cislo' => '987654321',
            'datum_registracie' => '2025-09-15',
            'typ_clena' => 5,
            'nickname' => 'glog',
            'ulica' => 'Kukucinova',
            'cislo_domu' => '99',
            'mesto_psc' => 1,
            'role' => UserRole::ZAKAZNIK,
        ],
        [
            'meno' => 'Adamm',
            'priezvisko' => 'Glogg',
            'heslo' => Hash::make('1234'),
            'email' => 'adamkooo@gmail.com',
            'telefonne_cislo' => '4564',
            'datum_registracie' => '2025-09-10',
            'typ_clena' => 4,
            'nickname' => 'glogADMIN',
            'ulica' => 'Kukucinovaa',
            'cislo_domu' => '999',
            'mesto_psc' => 12,
            'role' => UserRole::ADMIN,
        ],
        [
            'meno' => 'Martin',
            'priezvisko' => 'Span',
            'heslo' => Hash::make('1234'),
            'email' => 'martinko@gmail.com',
            'telefonne_cislo' => '876543210',
            'datum_registracie' => '2025-10-22',
            'typ_clena' => 2,
            'nickname' => 'dusan',
            'ulica' => 'Holubia',
            'cislo_domu' => '4',
            'mesto_psc' => 2,
            'role' => UserRole::ZAKAZNIK,
        ],
        [
            'meno' => 'Matus',
            'priezvisko' => 'Kris',
            'heslo' => Hash::make('1234'),
            'email' => 'unik@gmail.com',
            'telefonne_cislo' => '765432109',
            'datum_registracie' => '2025-12-15',
            'typ_clena' => 3,
            'nickname' => 'mts',
            'ulica' => 'Pivova',
            'cislo_domu' => '12',
            'mesto_psc' => 3,
            'role' => UserRole::ZAKAZNIK,
        ],
        [
            'meno' => 'Miska',
            'priezvisko' => 'Tom',
            'heslo' => Hash::make('1234'),
            'email' => 'chimney@gmail.com',
            'telefonne_cislo' => '654321098',
            'datum_registracie' => '2024-01-15',
            'typ_clena' => 4,
            'nickname' => 'chimney',
            'ulica' => 'Tatranska',
            'cislo_domu' => '21',
            'mesto_psc' => 4,
            'role' => UserRole::ZAKAZNIK,
        ],
        [
            'meno' => 'Sabi',
            'priezvisko' => 'Mat',
            'heslo' => Hash::make('1234'),
            'email' => 'sabinka@gmail.com',
            'telefonne_cislo' => '543210987',
            'datum_registracie' => '2026-02-03',
            'typ_clena' => 1,
            'nickname' => 'homium',
            'ulica' => 'Vysoka',
            'cislo_domu' => '3',
            'mesto_psc' => 5,
            'role' => UserRole::ZAKAZNIK,
        ],
        [
            'meno' => 'Ado',
            'priezvisko' => 'Hrom',
            'heslo' => Hash::make('1234'),
            'email' => 'svalnacik@gmail.com',
            'telefonne_cislo' => '432109876',
            'datum_registracie' => '2026-03-04',
            'typ_clena' => 2,
            'nickname' => 'hromo',
            'ulica' => 'Katkina',
            'cislo_domu' => '67',
            'mesto_psc' => 6,
            'role' => UserRole::ZAKAZNIK,
        ],
        [
            'meno' => 'Viktor',
            'priezvisko' => 'Vrb',
            'heslo' => Hash::make('1234'),
            'email' => 'uwr@gmail.com',
            'telefonne_cislo' => '321098765',
            'datum_registracie' => '2026-05-04',
            'typ_clena' => 3,
            'nickname' => 'vodnik',
            'ulica' => 'Plzenska',
            'cislo_domu' => '11',
            'mesto_psc' => 7,
            'role' => UserRole::ZAKAZNIK,
        ],
        ]);
    }
}
