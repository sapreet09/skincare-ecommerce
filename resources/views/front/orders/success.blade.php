@extends('front.layout.layout')

@section('content')

<div class="container text-center py-5">

    <h2 class="text-success">✅ Order Placed Successfully!</h2>

    <p class="mt-3">
        Thank you for your purchase.
    </p>

    <h4>Order ID: #{{ $order->id }}</h4>
    <h5>Total: ₹{{ $order->total_amount }}</h5>

    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
        Continue Shopping
    </a>

</div>

@endsection
