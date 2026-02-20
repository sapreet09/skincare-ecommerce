@extends('front.layout.layout')

@section('content')
    <div class="container mt-5">
        <h2>Checkout</h2>
        <div class="row">
            {{-- Billing Form --}}
            <div class="col-md-6">
                <form method="POST" action="{{ route('place.order') }}">
                    @csrf

                    <input class="form-control mb-3" name="name" placeholder="Full Name" required>
                    <input class="form-control mb-3" name="email" placeholder="Email" required>
                    <input class="form-control mb-3" name="phone" placeholder="Phone" required>

                    <textarea class="form-control mb-3"
                        name="address"
                        placeholder="Address"
                    required></textarea>

                    <button type="submit" class="btn btn-success w-100">
                        Place Order
                    </button>
                </form>
            </div>
            {{-- Order Summary --}}
            <div class="col-md-6">
                <h4>Order Summary</h4>
                @foreach($cartItems as $item)
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                        <span>₹{{ $item->product->price * $item->quantity }}</span>
                    </div>
                @endforeach
                <h4 class="mt-3">
                Total: ₹{{ $total }}
                </h4>
            </div>  
        </div>
    </div>
@endsection
