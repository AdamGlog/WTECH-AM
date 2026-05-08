<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with(['user', 'items.product'])
                    ->orderBy('datum_objednania')
                    ->get();
        return view('admin/adminOrders', compact('orders'));
    }
}
