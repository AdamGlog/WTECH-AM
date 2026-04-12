<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;

class ProductController extends Controller
{
    public function show($id)
    {
        $produkt = Produkt::findOrFail($id);
        return view('productPage', compact('produkt'));
    }
}
