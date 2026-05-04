<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduktObrazkySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produkt_obrazky')->insert([
        ['produkt_id' => 1, 'cesta' => 'resources/AllOfThemIII.webp', 'hlavny' => true],
        ['produkt_id' => 2, 'cesta' => 'resources/CyberBug.webp', 'hlavny' => true],
        ['produkt_id' => 3, 'cesta' => 'resources/megaboing.webp', 'hlavny' => true],
        ['produkt_id' => 4, 'cesta' => 'resources/MyMeowingCats.webp', 'hlavny' => true],
        ['produkt_id' => 5, 'cesta' => 'resources/PathOfFiitkar.webp', 'hlavny' => true],
        ['produkt_id' => 6, 'cesta' => 'resources/TheWichter.webp', 'hlavny' => true],
        ['produkt_id' => 6, 'cesta' => 'resources/TheWichter2.webp', 'hlavny' => false],
        ['produkt_id' => 6, 'cesta' => 'resources/TheWichter3.webp', 'hlavny' => false],
        ['produkt_id' => 7, 'cesta' => 'resources/football26.webp', 'hlavny' => true],
        ['produkt_id' => 7, 'cesta' => 'resources/football26_2.webp', 'hlavny' => false],
        ['produkt_id' => 8, 'cesta' => 'resources/PS6.webp', 'hlavny' => true],
        ['produkt_id' => 9, 'cesta' => 'resources/PS7.webp', 'hlavny' => true],
        ['produkt_id' => 10, 'cesta' => 'resources/Ybox180.webp', 'hlavny' => true],
        ['produkt_id' => 11, 'cesta' => 'resources/YboxSeriesM.webp', 'hlavny' => true],
        ['produkt_id' => 12, 'cesta' => 'resources/gamegirl.webp', 'hlavny' => true],
        ['produkt_id' => 13, 'cesta' => 'resources/GameGirlPro.webp', 'hlavny' => true],
        ['produkt_id' => 14, 'cesta' => 'resources/SteakDeck.webp', 'hlavny' => true],
        ['produkt_id' => 15, 'cesta' => 'resources/5SD.webp', 'hlavny' => true],
        ['produkt_id' => 16, 'cesta' => 'resources/Nontend.webp', 'hlavny' => true],
        ['produkt_id' => 17, 'cesta' => 'resources/Cap2POF.webp', 'hlavny' => true],
        ['produkt_id' => 18, 'cesta' => 'resources/CapPOF.webp', 'hlavny' => true],
        ['produkt_id' => 19, 'cesta' => 'resources/hrncekMegaboing.webp', 'hlavny' => true],
        ['produkt_id' => 20, 'cesta' => 'resources/MerchBoxMegaboing.webp', 'hlavny' => true],
        ['produkt_id' => 20, 'cesta' => 'resources/insideBox_Megaboing.webp', 'hlavny' => false],
        ['produkt_id' => 20, 'cesta' => 'resources/merchMegaBoing.webp', 'hlavny' => false],
        ['produkt_id' => 21, 'cesta' => 'resources/klucenka2Wichter.webp', 'hlavny' => true],
        ['produkt_id' => 22, 'cesta' => 'resources/klucenkaWichter.webp', 'hlavny' => true],
        ['produkt_id' => 23, 'cesta' => 'resources/plagatWichter2.webp', 'hlavny' => true],
        ['produkt_id' => 24, 'cesta' => 'resources/plagatWichter.webp', 'hlavny' => true],
        ['produkt_id' => 25, 'cesta' => 'resources/trickoWichter.webp', 'hlavny' => true],
        ['produkt_id' => 26, 'cesta' => 'resources/wichterHrncek.webp', 'hlavny' => true],
        ['produkt_id' => 27, 'cesta' => 'resources/wichterHrncek2.webp', 'hlavny' => true],
        ['produkt_id' => 28, 'cesta' => 'resources/FigurkaAllOfThemIII.webp', 'hlavny' => true],
        ['produkt_id' => 29, 'cesta' => 'resources/plysakMegaboing.webp', 'hlavny' => true],
        ['produkt_id' => 30, 'cesta' => 'resources/figurkaFutbalista.webp', 'hlavny' => true],
        ['produkt_id' => 31, 'cesta' => 'resources/MafiaHra.png', 'hlavny' => true],
        ['produkt_id' => 32, 'cesta' => 'resources/Mafia2Hra.png', 'hlavny' => true],
        ['produkt_id' => 33, 'cesta' => 'resources/TractorFarm26.png', 'hlavny' => true],
        ['produkt_id' => 34, 'cesta' => 'resources/YourDestroy.png', 'hlavny' => true],
        ['produkt_id' => 35, 'cesta' => 'resources/LifeShipping.png', 'hlavny' => true],
        ['produkt_id' => 36, 'cesta' => 'resources/CyclingRush.png', 'hlavny' => true],
        ['produkt_id' => 37, 'cesta' => 'resources/DrEuS.png', 'hlavny' => true],
        ['produkt_id' => 38, 'cesta' => 'resources/Dunk26.png', 'hlavny' => true],
        ['produkt_id' => 39, 'cesta' => 'resources/QueendomWentLostance.png', 'hlavny' => true],
        ['produkt_id' => 40, 'cesta' => 'resources/ice26.png', 'hlavny' => true],
        ['produkt_id' => 41, 'cesta' => 'resources/QWLhrncek.png', 'hlavny' => true],
        ['produkt_id' => 41, 'cesta' => 'resources/QWLhrncek2.png', 'hlavny' => false],
        ['produkt_id' => 41, 'cesta' => 'resources/QWLhrncek3.png', 'hlavny' => false],
        ['produkt_id' => 42, 'cesta' => 'resources/QWLMerchBox.png', 'hlavny' => true],
        ['produkt_id' => 42, 'cesta' => 'resources/QWLMerchBox2.png', 'hlavny' => false],
        ['produkt_id' => 43, 'cesta' => 'resources/LifeShippingMerchBoxSmall.png', 'hlavny' => true],
        ['produkt_id' => 44, 'cesta' => 'resources/LifeShippingMerchBoxBig.png', 'hlavny' => true],
        ['produkt_id' => 45, 'cesta' => 'resources/QWLfigurka.png', 'hlavny' => true],
        ['produkt_id' => 45, 'cesta' => 'resources/QWLfigurka2.png', 'hlavny' => false],
        ['produkt_id' => 46, 'cesta' => 'resources/LifeShippingFigurka.png', 'hlavny' => true],
        ['produkt_id' => 47, 'cesta' => 'resources/Football26RedFigurka.png', 'hlavny' => true]
    ]);
    }
}
