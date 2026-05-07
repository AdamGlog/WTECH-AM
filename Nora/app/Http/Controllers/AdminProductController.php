<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Kategoria;

class AdminProductController extends Controller
{
    public function index(){
        $products = Produkt::with('category')
                    ->orderBy('id')
                    ->get();
        $categories = Kategoria::orderBy('meno')->get();
        return view('admin.adminProducts', compact('products', 'categories'));
    }
}
