<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminDashboardController extends Controller
{
   
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalProducts' => Product::count(),
            'totalOrders' => Order::count(),
            'totalRevenue' => Order::sum('total'),
            'recentOrders' => Order::latest()->take(5)->get(),
            'users' => User::latest()->take(10)->get()
        ]);
    }

 public function showUsers()
    {
        $users = User::latest()->get(); // or paginate if needed
        return view('admin.users.index', compact('users'));
    }

    public function showProducts()
{
    $products = Product::latest()->get(); // or paginate
    return view('admin.products.index', compact('products'));
}

public function editProduct($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}

public function updateProduct(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $product->update($request->all());

    return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
}

public function deleteProduct($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
}


}
