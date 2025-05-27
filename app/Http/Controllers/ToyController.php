<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ToyController extends Controller
{
public function create()
{
    return view('products.toys');
        
}


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $filename);
                $imagePaths[] = $filename;
            }
        }

        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category = 'Toys'; // fixed category
        $product->images = $imagePaths;
        $product->save();

        return redirect()->route('toys.create')->with('success', 'Toy item added successfully!');
    }
}
