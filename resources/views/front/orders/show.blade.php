@extends('front.layout.layout')

@section('content')
    <div class="container mt-5">
        <h3>Order #{{ $order->id }}</h3>
        <div class="card mt-3 p-4">
            <h5>Shipping Details</h5>
            <p>
                <b>Name:</b> {{ $order->name }} <br>
                <b>Email:</b> {{ $order->email }} <br>
                <b>Phone:</b> {{ $order->phone }} <br>
                <b>Address:</b> {{ $order->address }}
            </p>

            <hr>

            <h5>Products</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>₹{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ $item->price * $item->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="text-end">
                Grand Total: ₹{{ $order->total_amount }}
            </h4>
        </div>
    </div>
@endsection
