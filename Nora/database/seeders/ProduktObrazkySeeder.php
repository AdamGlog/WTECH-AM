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
        ['produkt_id' => 1, 'cesta' => 'storage/AllOfThemIII.webp', 'hlavny' => true],
        ['produkt_id' => 2, 'cesta' => 'storage/CyberBug.webp', 'hlavny' => true],
        ['produkt_id' => 3, 'cesta' => 'storage/megaboing.webp', 'hlavny' => true],
        ['produkt_id' => 4, 'cesta' => 'storage/MyMeowingCats.webp', 'hlavny' => true],
        ['produkt_id' => 5, 'cesta' => 'storage/PathOfFiitkar.webp', 'hlavny' => true],
        ['produkt_id' => 6, 'cesta' => 'storage/TheWichter.webp', 'hlavny' => true],
        ['produkt_id' => 6, 'cesta' => 'storage/TheWichter2.webp', 'hlavny' => false],
        ['produkt_id' => 6, 'cesta' => 'storage/TheWichter3.webp', 'hlavny' => false],
        ['produkt_id' => 7, 'cesta' => 'storage/football26.webp', 'hlavny' => true],
        ['produkt_id' => 7, 'cesta' => 'storage/football26_2.webp', 'hlavny' => false],
        ['produkt_id' => 8, 'cesta' => 'storage/PS6.webp', 'hlavny' => true],
        ['produkt_id' => 9, 'cesta' => 'storage/PS7.webp', 'hlavny' => true],
        ['produkt_id' => 10, 'cesta' => 'storage/Ybox180.webp', 'hlavny' => true],
        ['produkt_id' => 11, 'cesta' => 'storage/YboxSeriesM.webp', 'hlavny' => true],
        ['produkt_id' => 12, 'cesta' => 'storage/gamegirl.webp', 'hlavny' => true],
        ['produkt_id' => 13, 'cesta' => 'storage/GameGirlPro.webp', 'hlavny' => true],
        ['produkt_id' => 14, 'cesta' => 'storage/SteakDeck.webp', 'hlavny' => true],
        ['produkt_id' => 15, 'cesta' => 'storage/5SD.webp', 'hlavny' => true],
        ['produkt_id' => 16, 'cesta' => 'storage/Nontend.webp', 'hlavny' => true],
        ['produkt_id' => 17, 'cesta' => 'storage/Cap2POF.webp', 'hlavny' => true],
        ['produkt_id' => 18, 'cesta' => 'storage/CapPOF.webp', 'hlavny' => true],
        ['produkt_id' => 19, 'cesta' => 'storage/hrncekMegaboing.webp', 'hlavny' => true],
        ['produkt_id' => 20, 'cesta' => 'storage/MerchBoxMegaboing.webp', 'hlavny' => true],
        ['produkt_id' => 20, 'cesta' => 'storage/insideBox_Megaboing.webp', 'hlavny' => false],
        ['produkt_id' => 20, 'cesta' => 'storage/merchMegaBoing.webp', 'hlavny' => false],
        ['produkt_id' => 21, 'cesta' => 'storage/klucenka2Wichter.webp', 'hlavny' => true],
        ['produkt_id' => 22, 'cesta' => 'storage/klucenkaWichter.webp', 'hlavny' => true],
        ['produkt_id' => 23, 'cesta' => 'storage/plagatWichter2.webp', 'hlavny' => true],
        ['produkt_id' => 24, 'cesta' => 'storage/plagatWichter.webp', 'hlavny' => true],
        ['produkt_id' => 25, 'cesta' => 'storage/trickoWichter.webp', 'hlavny' => true],
        ['produkt_id' => 26, 'cesta' => 'storage/wichterHrncek.webp', 'hlavny' => true],
        ['produkt_id' => 27, 'cesta' => 'storage/wichterHrncek2.webp', 'hlavny' => true],
        ['produkt_id' => 28, 'cesta' => 'storage/FigurkaAllOfThemIII.webp', 'hlavny' => true],
        ['produkt_id' => 29, 'cesta' => 'storage/plysakMegaboing.webp', 'hlavny' => true],
        ['produkt_id' => 30, 'cesta' => 'storage/figurkaFutbalista.webp', 'hlavny' => true],
        ['produkt_id' => 31, 'cesta' => 'storage/MafiaHra.webp', 'hlavny' => true],
        ['produkt_id' => 32, 'cesta' => 'storage/Mafia2Hra.webp', 'hlavny' => true],
        ['produkt_id' => 33, 'cesta' => 'storage/TractorFarm26.webp', 'hlavny' => true],
        ['produkt_id' => 34, 'cesta' => 'storage/YourDestroy.webp', 'hlavny' => true],
        ['produkt_id' => 35, 'cesta' => 'storage/LifeShipping.webp', 'hlavny' => true],
        ['produkt_id' => 36, 'cesta' => 'storage/CyclingRush.webp', 'hlavny' => true],
        ['produkt_id' => 37, 'cesta' => 'storage/DrEuS.webp', 'hlavny' => true],
        ['produkt_id' => 38, 'cesta' => 'storage/Dunk26.webp', 'hlavny' => true],
        ['produkt_id' => 39, 'cesta' => 'storage/QueendomWentLostance.webp', 'hlavny' => true],
        ['produkt_id' => 40, 'cesta' => 'storage/ice26.webp', 'hlavny' => true],
        ['produkt_id' => 41, 'cesta' => 'storage/QWLhrncek.webp', 'hlavny' => true],
        ['produkt_id' => 41, 'cesta' => 'storage/QWLhrncek2.webp', 'hlavny' => false],
        ['produkt_id' => 41, 'cesta' => 'storage/QWLhrncek3.webp', 'hlavny' => false],
        ['produkt_id' => 42, 'cesta' => 'storage/QWLMerchBox.webp', 'hlavny' => true],
        ['produkt_id' => 42, 'cesta' => 'storage/QWLMerchBox2.webp', 'hlavny' => false],
        ['produkt_id' => 43, 'cesta' => 'storage/LifeShippingMerchBoxSmall.webp', 'hlavny' => true],
        ['produkt_id' => 44, 'cesta' => 'storage/LifeShippingMerchBoxBig.webp', 'hlavny' => true],
        ['produkt_id' => 45, 'cesta' => 'storage/QWLfigurka.webp', 'hlavny' => true],
        ['produkt_id' => 45, 'cesta' => 'storage/QWLfigurka2.webp', 'hlavny' => false],
        ['produkt_id' => 46, 'cesta' => 'storage/LifeShippingFigurka.webp', 'hlavny' => true],
        ['produkt_id' => 47, 'cesta' => 'storage/Football26RedFigurka.webp', 'hlavny' => true]
    ]);
    }
}
