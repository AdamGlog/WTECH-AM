<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kosik;
use App\Models\KosikPolozka;

class CartController extends Controller
{
    public function pridat(Request $request)
    {
        $kosik = Kosik::firstOrCreate(
            ['pouzivatel_id' => auth()->id()]
        );

        $polozka = KosikPolozka::where('kosik_id', $kosik->id)
            ->where('produkt_id', $request->produkt_id)
            ->first();

        if ($polozka) {
            $polozka->update([
                'pocet_ks' => $polozka->pocet_ks + $request->pocet_ks
            ]);
        } else {
            KosikPolozka::create([
                'kosik_id' => $kosik->id,
                'produkt_id' => $request->produkt_id,
                'pocet_ks' => $request->pocet_ks,
            ]);
        }

        return redirect()->back()->with('success', 'Produkt pridaný do košíka!');
    }
}
