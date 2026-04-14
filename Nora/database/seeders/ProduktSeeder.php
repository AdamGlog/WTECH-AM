<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduktSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produkty')->insert([
        // Hry (kategoria_id: 1)
        ['kategoria_id' => 1, 'meno' => 'All of Them Part III', 'popis' => 'Tretí diel legendárnej série All of Them.', 'info' => 'null', 'obrazok' => 'AllOfThemIII', 'cena' => 59.99, 'doplnkove_info' => 'PS6, PC', 'pocet_na_sklade' => 25, 'hodnotenie' => 4.8, 'typ' => 'Adventúra'],
        ['kategoria_id' => 1, 'meno' => 'CyberBug 2067', 'popis' => 'Futuristická RPG hra v otvorenom svete.', 'info' => 'null', 'cena' => 54.99, 'obrazok' => 'CyberBug', 'doplnkove_info' => 'PC, PS6, PS7', 'pocet_na_sklade' => 40, 'hodnotenie' => 4.3, 'typ' => 'RPG'],
        ['kategoria_id' => 1, 'meno' => 'Megaboing', 'popis' => 'Zábavná plošinovka pre celú rodinu.', 'info' => 'null', 'cena' => 39.99, 'obrazok' => 'megaboing', 'doplnkove_info' => 'PC, PS6, PS7', 'pocet_na_sklade' => 60, 'hodnotenie' => 4.6, 'typ' => 'Akčné'],
        ['kategoria_id' => 1, 'meno' => 'My Meowing Cats', 'popis' => 'Relaxačná simulácia so mačkami.', 'info' => 'null', 'cena' => 19.99, 'obrazok' => 'MyMeowingCats', 'doplnkove_info' => 'PC, PS6', 'pocet_na_sklade' => 80, 'hodnotenie' => 4.5, 'typ' => 'Simulátor'],
        ['kategoria_id' => 1, 'meno' => 'Path of Fiitkar', 'popis' => 'Epická fantasy akčná RPG.', 'info' => 'null', 'cena' => 49.99, 'obrazok' => 'PathOfFiitkar', 'doplnkove_info' => 'PC, PS6, PS7', 'pocet_na_sklade' => 35, 'hodnotenie' => 4.7, 'typ' => 'RPG'],
        ['kategoria_id' => 1, 'meno' => 'The Wichter: The Legend of Regalt', 'popis' => 'Rozsiahla RPG hra s bohatým príbehom.', 'info' => 'Regalt z Virie nebol vždy legendou. Bol to muž s mečom, dlhmi a príliš veľa nepriateľmi. V tejto epickej RPG hre prežiješ jeho príbeh od začiatku - od prvého zabitého monštra až po okamih, keď celý svet začal šepkať jeho meno.
        Preskúmaj rozľahlý otvorený svet plný živých miest, zabudnutých ruín a stvorení, ktoré ťa nepustia spať. Každé rozhodnutie má cenu. Každý spojenec môže byť zrada. A každý súboj môže byť posledný.', 'cena' => 49.99, 'obrazok' => 'TheWichter', 'doplnkove_info' => 'PC, PS6, PS7', 'pocet_na_sklade' => 50, 'hodnotenie' => 4.9, 'typ' => 'RPG'],
        ['kategoria_id' => 1, 'meno' => 'Football 26', 'popis' => 'Moderná futbalová hra s pokročilými technikami a rýchlonaučiteľným formátom.', 'info' => 'null', 'cena' => 59.99, 'obrazok' => 'football26', 'doplnkove_info' => 'PC, PS6, PS7', 'pocet_na_sklade' => 50, 'hodnotenie' => 4.3, 'typ' => 'Športové'],

        // Konzoly (kategoria_id: 2)
        ['kategoria_id' => 2, 'meno' => 'PlayState 6', 'popis' => 'Výkonná herná konzola 6. generácie.', 'info' => 'null', 'cena' => 499.99, 'obrazok' => 'PS6', 'doplnkove_info' => '1TB SSD, 4K HDR', 'pocet_na_sklade' => 15, 'hodnotenie' => 4.8, 'typ' => 'K TV'],
        ['kategoria_id' => 2, 'meno' => 'PlayState 7', 'popis' => 'Najnovšia herná konzola s 8K podporou.', 'info' => 'null', 'cena' => 649.99, 'obrazok' => 'PS7', 'doplnkove_info' => '2TB SSD, 8K HDR', 'pocet_na_sklade' => 10, 'hodnotenie' => 4.9, 'typ' => 'Moderné'],
        ['kategoria_id' => 2, 'meno' => 'Ybox 180', 'popis' => 'Výkonná herná konzola od Ybox so stálou podporou', 'info' => 'null', 'cena' => 479.99, 'obrazok' => 'Ybox180', 'doplnkove_info' => '1TB SSD, 4K HDR', 'pocet_na_sklade' => 22, 'hodnotenie' => 4.9, 'typ' => 'K TV'],
        ['kategoria_id' => 2, 'meno' => 'Ybox Series M', 'popis' => 'Najmodernejšia herná konzola s až 8K podporou.', 'info' => 'null', 'cena' => 659.99, 'obrazok' => 'YboxSeriesM', 'doplnkove_info' => '2TB SSD, 8K HDR', 'pocet_na_sklade' => 9, 'hodnotenie' => 4.6, 'typ' => 'Moderné'],
        ['kategoria_id' => 2, 'meno' => 'GameGirl', 'popis' => 'Retro konzola určená pre nežnejšie pokolenie so zábavnými hrami.', 'info' => 'null', 'cena' => 79.99, 'obrazok' => 'gamegirl', 'doplnkove_info' => '256GB HDD, FULL HD', 'pocet_na_sklade' => 22, 'hodnotenie' => 4.5, 'typ' => 'HandHeld'],
        ['kategoria_id' => 2, 'meno' => 'GameGirl Pro', 'popis' => 'Výkonnejšia konzola pre ženy s modernejšími hrami.', 'info' => 'null', 'cena' => 199.99, 'obrazok' => 'GameGirlPro', 'doplnkove_info' => '512GB SSD, 2K HDR', 'pocet_na_sklade' => 11, 'hodnotenie' => 4.8, 'typ' => 'HandHeld'],
        ['kategoria_id' => 2, 'meno' => 'Steak Deck', 'popis' => 'Najvýkonnejšia Konzola pre hranie na cestách', 'info' => 'null', 'cena' => 349.99, 'obrazok' => 'SteakDeck', 'doplnkove_info' => '1024GB SSD, Full HD', 'pocet_na_sklade' => 6, 'hodnotenie' => 5, 'typ' => 'HandHeld'],
        ['kategoria_id' => 2, 'meno' => '5SD', 'popis' => 'Retro konzola pre hranie retro hier', 'info' => 'null', 'cena' => 99.99, 'obrazok' => '5SD', 'doplnkove_info' => '128GB SSD, HD', 'pocet_na_sklade' => 3, 'hodnotenie' => 3.6, 'typ' => 'Retro'],
        ['kategoria_id' => 2, 'meno' => 'Nontend', 'popis' => 'Retro konzola pre hranie Mioro a Ligiui hier', 'info' => 'null', 'cena' => 149.99, 'obrazok' => 'Nontend', 'doplnkove_info' => '256GB SSD, Full HD', 'pocet_na_sklade' => 5, 'hodnotenie' => 0.8, 'typ' => 'Retro'],
        
        // Merch (kategoria_id: 3)
        ['kategoria_id' => 3, 'meno' => 'Šiltovka Path of Fiitkar', 'popis' => 'Oficiálna šiltovka hry Path of Fiitkar.', 'info' => 'null', 'cena' => 24.99, 'obrazok' => 'Cap2POF', 'doplnkove_info' => 'Univerzálna veľkosť', 'pocet_na_sklade' => 100, 'hodnotenie' => 4.4, 'typ' => 'Oblečenie'],
        ['kategoria_id' => 3, 'meno' => 'Fanúšikovská šiltovka Path of Fiitkar', 'popis' => 'Limitovaná fanúšikovská edícia šiltovky.', 'info' => 'null', 'cena' => 19.99, 'obrazok' => 'CapPOF', 'doplnkove_info' => 'Univerzálna veľkosť', 'pocet_na_sklade' => 75, 'hodnotenie' => 4.2, 'typ' => 'Oblečenie'],
        ['kategoria_id' => 3, 'meno' => 'Hrnček Megaboing', 'popis' => 'Keramický hrnček s motívom hry Megaboing.', 'info' => 'null', 'cena' => 14.99, 'obrazok' => 'hrncekMegaboing', 'doplnkove_info' => '330ml', 'pocet_na_sklade' => 120, 'hodnotenie' => 4.5, 'typ' => 'Hrnček'],
        ['kategoria_id' => 3, 'meno' => 'Megabox merchu Megaboing', 'popis' => 'Kolekcia merchandise z hry Megaboing v darčekovej krabici.', 'info' => 'null', 'cena' => 79.99, 'obrazok' => 'MerchBoxMegaboing', 'doplnkove_info' => 'Obsahuje tričko, hrnček, plagát', 'pocet_na_sklade' => 30, 'hodnotenie' => 4.7, 'typ' => 'Box'],
        ['kategoria_id' => 3, 'meno' => 'Originálna kľúčenka The Wichter', 'popis' => 'Oficiálna kovová kľúčenka The Wichter.', 'info' => 'null', 'cena' => 9.99, 'obrazok' => 'klucenka2Wichter', 'doplnkove_info' => 'Kov, 5cm', 'pocet_na_sklade' => 200, 'hodnotenie' => 4.6, 'typ' => 'Kľúčenka'],
        ['kategoria_id' => 3, 'meno' => 'Prémiová kľúčenka The Wichter', 'popis' => 'Prémiová kľúčenka z pozláteného kovu.', 'info' => 'null', 'cena' => 19.99, 'obrazok' => 'klucenkaWichter', 'doplnkove_info' => 'Pozlátený kov, 6cm', 'pocet_na_sklade' => 80, 'hodnotenie' => 4.8, 'typ' => 'Kľúčenka'],
        ['kategoria_id' => 3, 'meno' => 'Originálny plagát The Wichter', 'popis' => 'Oficiálny plagát hry The Wichter.', 'info' => 'null', 'cena' => 12.99, 'obrazok' => 'plagatWichter2', 'doplnkove_info' => 'A2, lesklý papier', 'pocet_na_sklade' => 150, 'hodnotenie' => 4.5, 'typ' => 'Plagát'],
        ['kategoria_id' => 3, 'meno' => 'Fan plagát The Wichter', 'popis' => 'Limitovaný fanúšikovský plagát The Wichter.', 'info' => 'null', 'cena' => 9.99, 'obrazok' => 'plagatWichter', 'doplnkove_info' => 'A3, matný papier', 'pocet_na_sklade' => 200, 'hodnotenie' => 4.3, 'typ' => 'Plagát'],
        ['kategoria_id' => 3, 'meno' => 'Tričko The Wichter', 'popis' => 'Bavlnené tričko s logom The Wichter.', 'info' => 'null', 'cena' => 29.99, 'obrazok' => 'trickoWichter', 'doplnkove_info' => 'Veľkosti S-XXL, 100% bavlna', 'pocet_na_sklade' => 90, 'hodnotenie' => 4.6, 'typ' => 'Oblečenie'],
        ['kategoria_id' => 3, 'meno' => 'Hrnček The Wichter', 'popis' => 'Keramický hrnček s motívom The Wichter.', 'info' => 'null', 'cena' => 14.99, 'obrazok' => 'wichterHrncek', 'doplnkove_info' => '330ml', 'pocet_na_sklade' => 110, 'hodnotenie' => 4.4, 'typ' => 'Hrnček'],
        ['kategoria_id' => 3, 'meno' => 'Zlatý hrnček The Wichter', 'popis' => 'Limitovaný zlatý hrnček The Wichter.', 'info' => 'null', 'cena' => 34.99, 'obrazok' => 'wichterHrncek2', 'doplnkove_info' => '400ml, zlatý povlak', 'pocet_na_sklade' => 40, 'hodnotenie' => 4.9, 'typ' => 'Hrnček'],

        // Figúrky (kategoria_id: 4)
        ['kategoria_id' => 4, 'meno' => 'Figúrka All of Them Part III: Ellie', 'popis' => 'Detailná figúrka postavy Ellie z hry All of Them Part III.', 'info' => 'null', 'cena' => 44.99, 'obrazok' => 'FigurkaAllOfThemIII', 'doplnkove_info' => '20cm, PVC', 'pocet_na_sklade' => 45, 'hodnotenie' => 4.9, 'typ' => 'Plast'],
        ['kategoria_id' => 4, 'meno' => 'Plyšák Vlad z Megaboing', 'popis' => 'Mäkký plyšový Vlad z hry Megaboing.', 'info' => 'null', 'cena' => 24.99, 'obrazok' => 'plysakMegaboing', 'doplnkove_info' => '30cm, polyester', 'pocet_na_sklade' => 70, 'hodnotenie' => 4.7, 'typ' => 'Plyšové'],
        ['kategoria_id' => 4, 'meno' => 'Figúrka Football 26: Alexander-Arnold', 'popis' => 'Figúrka hráča Alexander-Arnold z Football 26.', 'info' => 'Autentická figúrka jedného z najlepších futbalistov moderných čias. Trent hrá za špičkový španielsky klub a vďaka svojim dychberúcim výkonom sa stal jedným z tvárí moderného futbalu.', 'cena' => 29.99, 'obrazok' => 'figurkaFutbalista', 'doplnkove_info' => '30cm, kvalitný plast, ručná práca', 'pocet_na_sklade' => 60, 'hodnotenie' => 4.6, 'typ' => 'Vinyl'],
        ]);
    }
}
