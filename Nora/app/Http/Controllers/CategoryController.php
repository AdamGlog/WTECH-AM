<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Kategoria;

class CategoryController extends Controller
{
    public function show($nazov)
    {
        $kategoria = Kategoria::where('meno', $nazov)->firstOrFail();
        
        $produkty = Produkt::where('kategoria_ID', $kategoria->id)
                           ->paginate(6); // 6 produktov na stranku = 2 riadky x 3 karty
        
        return view('categoryPage', [
            'produkty' => $produkty,
            'kategoria' => $kategoria
        ]);
    }
}