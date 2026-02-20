@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <h3 class="mb-4">Admin Dashboard</h3>
        <div class="row">

            {{-- Total Orders --}}
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <h6>Total Orders</h6>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>

            {{-- Pending --}}
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <h6>Pending Orders</h6>
                    <h3 class="text-warning">{{ $pendingOrders }}</h3>
                </div>
            </div>

            {{-- Delivered --}}
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <h6>Delivered Orders</h6>
                    <h3 class="text-success">{{ $deliveredOrders }}</h3>
                </div>
            </div>

            {{-- Revenue --}}
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <h6>Total Revenue</h6>
                    <h3>₹{{ $totalRevenue }}</h3>
                </div>
            </div>

        </div>

        {{-- Latest Orders --}}
        <div class="card mt-5 shadow">
            <div class="card-header">
                Latest Orders
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($latestOrders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>₹{{ $order->total_amount }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
