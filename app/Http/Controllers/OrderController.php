<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show all orders (admin or user)

public function index()
{
    $recentOrders = Order::with('items.product')->latest()->get();
    return view('admin.orders.index', compact('recentOrders'));
}
// 

// 

    // Show a single order
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Create a new order (usually from checkout)
    public function store(Request $request)
    {
        // You’ll add checkout logic here later
    }
}
