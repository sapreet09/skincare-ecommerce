@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h3>Orders</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>₹{{ $order->total_amount }}</td>
                    <td>
                        <span class="badge bg-info">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show',$order->id) }}"
                        class="btn btn-sm btn-dark">
                        View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
@endsection
