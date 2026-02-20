@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h3>Order #{{ $order->id }}</h3>
        <p><b>Name:</b> {{ $order->name }}</p>
        <p><b>Email:</b> {{ $order->email }}</p>
        <p><b>Phone:</b> {{ $order->phone }}</p>
        <p><b>Address:</b> {{ $order->address }}</p>
        <hr>
            <h5>Items</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ $item->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Total: ₹{{ $order->total_amount }}</h4>
        <hr>

        <form method="POST"
            action="{{ route('admin.orders.status',$order->id) }}">
            @csrf

            <select name="status" class="form-select w-25">
                <option value="pending">Pending</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
            </select>

            <button class="btn btn-primary mt-2">
                Update Status
            </button>
        </form>
    </div>
@endsection
