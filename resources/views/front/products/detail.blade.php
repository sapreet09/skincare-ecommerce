@extends('front.layout.layout')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('images/'.$product->image) }}"
                    class="img-fluid rounded shadow">
            </div>
            <div class="col-md-7">
                <h2>{{ $product->name }}</h2>
                <h4 class="text-success mt-3">
                    ₹{{ $product->price }}
                </h4>
                <p class="mt-3">
                    {{ $product->description }}
                </p>
                <p>
                    Stock: 
                    <span class="badge bg-success">
                        {{ $product->stock }}
                    </span>
                </p>
                <button class="btn btn-pink mt-3 addToCart"
                    data-id="{{ $product->id }}">
                    Add to Cart
                </button>
            </div>
        </div>

        <hr class="my-5">
        <h4>Related Products</h4>
        <div class="row">
            @foreach($relatedProducts as $item)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('front/images/products/'.$item->image) }}"
                            class="card-img-top">
                        <div class="card-body text-center">
                            <h6>{{ $item->name }}</h6>
                            <p class="text-success">
                            ₹{{ $item->price }}
                            </p>
                            <a href="{{ route('product.detail',$item->slug) }}"
                                class="btn btn-sm btn-outline-dark">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
