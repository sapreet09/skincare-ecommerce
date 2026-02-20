@extends('front.layout.layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Shopping Cart</h2>
        @if($cartItems->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('front/images/products/'.$item->product->image) }}"
                                        width="70" class="me-3">
                                    {{ $item->product->name }}
                                </div>
                            </td>
                            <td>₹{{ $item->product->price }}</td>
                            <td>
                                <form action="{{ route('update.cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                    <input type="number" name="quantity"
                                        value="{{ $item->quantity }}"
                                        min="1"
                                        style="width:80px"
                                        onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>
                                ₹{{ $item->product->price * $item->quantity }}
                            </td>
                            <td>
                                <a href="{{ route('remove.cart',$item->id) }}"
                                class="btn btn-danger btn-sm">
                                Remove
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-end">
                <h4>Grand Total: <span class="text-success">₹{{ $total }}</span></h4>
                <a href="{{ route('checkout') }}" class="btn btn-success mt-3">
                    Proceed to Checkout
                </a>
            </div>
        @else
            <div class="alert alert-warning">
                Your cart is empty.
            </div>
        @endif
    </div>
@endsection
