<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Show all products on the shop page
    public function category($category)
{
    $products = Product::where('category', $category)->get();
    return view('category', compact('products', 'category'));
}

  public function index()
{
    $products = Product::all(); // fetch all books from DB
    return view('shop', compact('products'));
}


    // Show all products on the homepage (index)
    public function home()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    // Show a single product details page
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-detail', compact('product'));
    }

    // Show the create form
    public function create()
    {
        return view('products.create'); // form view
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'nullable|string|max:255',
        'category' => 'nullable|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'nullable|integer',
        'description' => 'nullable|string',
        'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

$imagePaths = [];

if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $imagePaths[] = $imageName; // Store just the filename
    }

}
Product::create([
    'title' => $request->title,
    'author' => $request->author,
    'category' => $request->category, // Add this!
    'price' => $request->price,
    'stock' => $request->stock ?? 0,
    'description' => $request->description ?? '',
    'images' => $imagePaths,
]);


    return redirect()->route('shop.index')->with('success', 'Book added successfully!');
}
}
