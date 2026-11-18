<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $usersCount    = User::where('role', 'user')->count();
        $ordersCount   = Order::count();
        $ordersValue   = Order::where('status', '!=', 'cancelled')->sum('total');
        $recentOrders  = Order::with('user')->latest()->take(4)->get();

        return view('admin.index', compact(
            'productsCount',
            'usersCount',
            'ordersCount',
            'ordersValue',
            'recentOrders'
        ));
    }
}
