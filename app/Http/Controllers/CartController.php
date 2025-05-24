<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            "title" => $product->title,
            "price" => $product->price,
            "image" => $product->images[0] ?? 'default.jpg',
            "quantity" => ($cart[$product->id]['quantity'] ?? 0) + 1,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
    public function update(Request $request)
{
    $cart = session()->get('cart', []);

    $id = $request->input('id');
    $quantity = (int) $request->input('quantity');

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = max(1, $quantity); // minimum quantity = 1
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Quantity updated!');
    }

    return redirect()->back()->with('error', 'Item not found.');
}

}
