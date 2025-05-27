<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function showUsers()
    {
        $users = User::latest()->get(); // or paginate if needed
        return view('admin.users.index', compact('users'));
    }

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
}
