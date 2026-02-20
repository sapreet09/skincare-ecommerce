@extends('front.layout.layout')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Our Skincare Products</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/'.$product->image) }}" class="card-img-top">
                <div class="card-body text-center">
                    <h5>{{ $product->name }}</h5>
                    <p>₹{{ $product->price }}</p>

                    <button class="btn btn-success">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
