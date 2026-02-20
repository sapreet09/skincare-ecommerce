<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(4)->get();

        return view('front.home', compact('products'));
    }

    public function productDetails($slug) {
        $product = Product::where('slug',$slug)->first();
        return view('front.product_details', compact('product'));
    }
}


