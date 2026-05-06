<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoria;

class AdminCategoryController extends Controller
{
    public function index(){
        $categories = Kategoria::withCount('products')
                       ->orderBy('id')
                       ->get();
        return view('admin.adminCategories', compact('categories'));
    }
}
