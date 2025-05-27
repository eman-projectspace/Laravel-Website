<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StationeryController extends Controller
{
   public function create()
{
    return view('products.stationery');
        
}


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle multiple images upload
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $filename);
                $imagePaths[] = $filename;
            }
        }

        // Save product
        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category = 'Stationery';  // fixed category here
        $product->images = $imagePaths; // assuming 'images' is casted to array in your Product model
        $product->save();

        return redirect()->route('stationery.create')->with('success', 'Item added successfully!');
    }
}
