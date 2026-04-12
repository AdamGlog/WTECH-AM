<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Kategoria;

class CategoryController extends Controller
{
    public function show(Request $request, $nazov)
    {
        $kategoria = Kategoria::where('meno', $nazov)->firstOrFail();
        
        $query = Produkt::where('kategoria_id', $kategoria->id);

        // Filtrovanie cena od
        if ($request->filled('cena_od')) {
            $query->where('cena', '>=', $request->cena_od);
        }

        // Filtrovanie cena do
        if ($request->filled('cena_do')) {
            $query->where('cena', '<=', $request->cena_do);
        }

        // Filtrovanie hodnotenie
        if ($request->filled('hodnotenie')) {
            $query->where('hodnotenie', '>=', $request->hodnotenie);
        }

        // Zoradenie
        switch ($request->sort) {
            case 'najlacnejsie':
                $query->orderBy('cena', 'asc');
                break;
            case 'najdrahsie':
                $query->orderBy('cena', 'desc');
                break;
            case 'hodnotenie':
                $query->orderBy('hodnotenie', 'desc');
                break;
            default:
                $query->orderBy('id', 'asc');
                break;
        }

        $produkty = $query->paginate(6)->withQueryString();
        // withQueryString() zachová filter/sort parametre v strankovacích linkoch

        return view('categoryPage', [
            'produkty' => $produkty,
            'kategoria' => $kategoria
        ]);
    }
}