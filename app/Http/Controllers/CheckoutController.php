<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $cart = session('cart', []);
        $grandTotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'total' => $grandTotal,
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'title' => $item['title'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect('/shop')->with('success', 'Order placed successfully!');
    }
public function showForm()
{
    $cart = session('cart', []);
    $grandTotal = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    return view('checkout', compact('cart', 'grandTotal'));
}

}
