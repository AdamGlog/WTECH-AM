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
        // withQueryString() zachová filter/sort parametre v strankovacích linkoch
        $produkty = $query->paginate(6)->withQueryString();

        return view('categoryPage', [
            'produkty' => $produkty,
            'kategoria' => $kategoria,
            'baseUrl' => '/category/' . $kategoria->meno
        ]);
    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('search-querry');
        
        $query = Produkt::query();
        // ilike aby sme ignorovali case
        if ($searchQuery) {
            $query->where(function($q) use ($searchQuery) {
                $q->where('meno', 'ilike', '%' . $searchQuery . '%')
                ->orWhere('popis', 'ilike', '%' . $searchQuery . '%');
            });
        }

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
        // withQueryString() zachová filter/sort parametre v strankovacích linkoch
        $produkty = $query->paginate(6)->withQueryString();

        return view('categoryPage', [
            'produkty' => $produkty,
            'kategoria' => null,
            'searchQuery' => $searchQuery,
            'baseUrl' => '/search?search-querry=' . urlencode($searchQuery)
        ]);
    }
}