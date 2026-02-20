@extends('front.layout.layout')

@section('content')
    <div class="container py-5">
        <h3>Invoice #{{ $order->id }}</h3>
        <table class="table mt-4">
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>

            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ $item->price }}</td>
            </tr>
            @endforeach
        </table>

        <h4 class="text-end">
            Total: ₹{{ $order->total_amount }}
        </h4>

        <button onclick="window.print()" class="btn btn-dark mb-3">
            Print Invoice
        </button>
    </div>
@endsection
