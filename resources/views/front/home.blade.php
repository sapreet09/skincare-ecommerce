@extends('front.layout.layout')

@section('content')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container text-center">
            <h1 class="hero-title">Glow Naturally</h1>
            <p class="hero-subtitle">Premium Skincare Products for Healthy Skin</p>
            <a href="#products" class="btn btn-primary btn-lg">Shop Now</a>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container mt-5">
        <h2 class="section-title text-center mb-4">Shop by Category</h2>
        <div class="row text-center">
            <div class="col-md-3">
                <div class="category-card">
                    <img src="{{ asset('images/cleanser.jpg') }}">
                    <h5>Cleanser</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="category-card">
                    <img src="{{ asset('images/moisturizer.jpg') }}">
                    <h5>Moisturizer</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="category-card">
                    <img src="{{ asset('images/serum.jpg') }}">
                    <h5>Serum</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="category-card">
                    <img src="{{ asset('images/sunscreen.jpg') }}">
                    <h5>Sunscreen</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="container mt-5" id="products">
        <h2 class="section-title text-center mb-4">Featured Products</h2>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="product-card">
                    <a href="{{ url('product/'.$product->slug) }}">
                        <img src="{{ asset('images/'.$product->image) }}">
                    </a>

                    <div class="product-info">
                        <h5>{{ $product->name }}</h5>
                        <p class="price">₹{{ $product->price }}</p>
                        <a href="{{ route('add.cart', $product->id) }}" class="btn btn-success">
                            Add to Cart
                        </a>
                        <a href="{{ route('product.detail', $product->slug) }}"
                            class="btn btn-outline-primary btn-sm">
                                View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
