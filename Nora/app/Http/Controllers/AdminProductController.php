<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Kategoria;
use App\Http\Requests\StoreProduct;
use App\Services\ProductService;

class AdminProductController extends Controller
{
    public function index(){
        $products = Produkt::with(['category', 'obrazky'])
                    ->orderBy('id')
                    ->get();
        return view('admin.adminProducts', compact('products')); 
    }

    public function store(StoreProduct $request, ProductService $productService)
    {
        $productService->createProduct($request->validated());
        return redirect()->back()->with('success', 'Produkt bol vytvorený.');
    }

    public function update(StoreProduct $request, Produkt $product, ProductService $productService)
    {
        $productService->updateProduct($product, $request->validated());
        return redirect()->back()->with('success', 'Produkt bol upravený.');
    }

    public function delete(Produkt $product, ProductService $productService)
    {
        $productService->deleteProduct($product);
        return redirect()->back()->with('success', 'Produkt bol odstránený.');
    }
}
