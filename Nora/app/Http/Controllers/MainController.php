<?php
namespace App\Http\Controllers;
use App\Models\Produkt;

class MainController extends Controller
{
    public function main()
    {
        // 9 najnovsich produktov podla created_at
        $noveProukty = Produkt::orderBy('created_at', 'desc')->take(9)->get();

        // 9 najlepsie hodnotenych produktov
        $odporucaneProukty = Produkt::orderBy('hodnotenie', 'desc')->take(9)->get();
        
        return view('main', [
            'noveProukty' => $noveProukty,
            'odporucaneProukty' => $odporucaneProukty
        ]);
    }
}