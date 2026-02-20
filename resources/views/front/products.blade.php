@extends('front.layout.layout')

@section('content')
    <h2>All Products</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x250">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>₹{{ $product->price }}</p>
                        <a href="/product/{{ $product->id }}" class="btn btn-success">
                            View Product
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection