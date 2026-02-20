@extends('front.layout.layout')

@section('content')

<div class="container text-center mt-5">
    <h3>Complete Payment</h3>

    <button id="pay-btn" class="btn btn-dark mt-4">
        Pay ₹{{ $order->total_amount }}
    </button>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

var options = {
    "key": "{{ $razorpayKey }}",
    "amount": "{{ $amount }}",
    "currency": "INR",
    "name": "GlowCare",
    "description": "Order Payment",
    "order_id": "{{ $order->payment_id }}",

    handler: function (response) {

        window.location.href =
            "/payment-success/{{ $order->id }}?payment_id="
            + response.razorpay_payment_id;
    }
};

var rzp = new Razorpay(options);

document.getElementById('pay-btn').onclick = function(e){
    rzp.open();
    e.preventDefault();
}

</script>

@endsection