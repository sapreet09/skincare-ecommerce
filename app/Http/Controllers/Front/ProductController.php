<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('front.products', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('front.product_detail', compact('product'));
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('front.products.detail', compact('product', 'relatedProducts'));
    }

}
