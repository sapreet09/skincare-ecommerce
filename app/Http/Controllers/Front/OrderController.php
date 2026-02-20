<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // User orders list
    public function index()
    {
        $orders = Order::where('email', Auth::user()->email)
                    ->latest()
                    ->get();

        return view('front.orders.index', compact('orders'));
    }

    // Single order details
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return view('front.orders.show', compact('order'));
    }

    public function invoice($id) {
        $order = Order::with('items.product')->findOrFail($id);

        return view('front.orders.invoice', compact('order'));
    }
}

