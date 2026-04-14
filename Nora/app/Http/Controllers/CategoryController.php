<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Kategoria;

// Filter a baseURL logika vytvorená pomocou GrokAI https://grok.com/
class CategoryController extends Controller
{
    public function show(Request $request, $nazov){

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

    // Filtrovanie typ (dynamické)
    if ($request->filled('typ')) {
        $query->whereIn('typ', $request->typ);
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

    // Získanie všetkých unikátnych typov pre túto kategóriu (pre filter)
    $vsetkyTypy = Produkt::where('kategoria_id', $kategoria->id)
                         ->select('typ')
                         ->distinct()
                         ->orderBy('typ')
                         ->pluck('typ')
                         ->toArray();

    return view('categoryPage', [
        'produkty' => $produkty,
        'kategoria' => $kategoria,
        'vsetkyTypy' => $vsetkyTypy,           
        'baseUrl' => '/category/' . $kategoria->meno . '?'
    ]);
}

    public function search(Request $request)
    {
        $searchQuery = $request->input('search-querry');
        
        $query = Produkt::query();

        // ilike aby sme ignorovali case, skupinovy where aby filter fungoval spravne
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

        // Filtrovanie typ
        if ($request->filled('typ')) {
            $query->whereIn('typ', $request->typ);
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

        // Získanie všetkých unikátnych typov pre túto kategóriu (pre filter)
        $vsetkyTypy = Produkt::select('typ')
                     ->distinct()
                     ->orderBy('typ')
                     ->pluck('typ')
                     ->toArray();

        return view('categoryPage', [
            'produkty' => $produkty,
            'kategoria' => null,
            'searchQuery' => $searchQuery,
            'vsetkyTypy' => $vsetkyTypy,
            // & na konci aby dalsie parametre fungovali spravne
            'baseUrl' => '/search?search-querry=' . urlencode($searchQuery) . '&'
        ]);
    }

    // Vrati vsetky produkty zoradene od najlacnejsieho - pre mega vypredaj banner
    public function vsetky(Request $request)
    {
        $query = Produkt::query();

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

        // Filtrovanie typ
        if ($request->filled('typ')) {
            $query->whereIn('typ', $request->typ);
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
                $query->orderBy('cena', 'asc');
                break;
        }

        $produkty = $query->paginate(6)->withQueryString();

        // Získanie všetkých unikátnych typov pre túto kategóriu (pre filter)
        $vsetkyTypy = Produkt::select('typ')
                     ->distinct()
                     ->orderBy('typ')
                     ->pluck('typ')
                     ->toArray();

        return view('categoryPage', [
            'produkty' => $produkty,
            'kategoria' => null,
            'searchQuery' => 'Všetky produkty',
            'vsetkyTypy' => $vsetkyTypy,
            'baseUrl' => '/vsetky?'
        ]);
    }
}