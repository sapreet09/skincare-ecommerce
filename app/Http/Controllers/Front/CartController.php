<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Show Cart
    public function index()
    {
        $cartItems = Cart::with('product')->get();

        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        return view('front.cart.index', compact('cartItems','total'));
    }

    // Add to Cart
    public function add($id) {
        $cart = Cart::where('product_id', $id)
            ->where(function ($query) {
                if(auth()->check()){
                    $query->where('user_id', auth()->id());
                } else {
                    $query->where('session_id', session()->getId());
                }
            })
            ->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'product_id' => $id,
                'quantity' => 1,
                'user_id' => auth()->id(),
                'session_id' => session()->getId(),
            ]);
        }
        return back()->with('success','Added to cart');
    }


    // Update Quantity
    public function update(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back();
    }

    // Remove Item
    public function remove($id)
    {
        Cart::where('id',$id)->delete();
        return redirect()->back();
    }
}
