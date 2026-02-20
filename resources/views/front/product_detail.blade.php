@extends('front.layout.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/'.$product->image) }}"
                width="100%">
            </div>

            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <h4>₹{{ $product->price }}</h4>
                <p>{{ $product->description }}</p>
                <button class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
    </div>
@endsection