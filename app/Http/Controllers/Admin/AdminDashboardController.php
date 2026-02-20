<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();

        $pendingOrders = Order::where('status','pending')->count();

        $deliveredOrders = Order::where('status','delivered')->count();

        $totalRevenue = Order::where('status','delivered')
                            ->sum('total_amount');

        $latestOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'deliveredOrders',
            'totalRevenue',
            'latestOrders'
        ));
    }
}