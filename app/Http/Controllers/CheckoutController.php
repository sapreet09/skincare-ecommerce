<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('front.checkout', compact('cartItems','total'));
    }

    public function placeOrder(Request $request) {
    
        $cartItems = Cart::where('session_id', session()->getId())->get();
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        // Create Order (pending)
        $order = Order::create([
            'name' => $request->name,
            'email' => Auth::user()->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_amount' => $total,
            'status' => 'pending'
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Razorpay
        $api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );

        $razorpayOrder = $api->order->create([
            'receipt' => (string) $order->id,
            'amount' => (int) ($total * 100), // paise
            'currency' => 'INR'
        ]);

        $order->payment_id = $razorpayOrder['id'];
        $order->save();

        return view('front.checkout.payment', [
            'order' => $order,
            'razorpayKey' => config('services.razorpay.key'),
            'amount' => $total * 100
        ]);
    }
}

