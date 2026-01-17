@extends('user-dashbord.userdashboard')

@section('title', 'Customer Dashboard')

@section('content')
<h3 class="mb-4">Shopping Cart</h3>

<!-- Cart Table -->
<div class="card mb-4">
    <div class="card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($orders->isEmpty())
            <tr>
                <td colspan="6" class="text-center">No items in cart</td>
            </tr>
             @else
            @php
    $totalValue = 0;
@endphp


            @foreach($orders as $order)
                          
                           @php
        $totalValue += ($order->offer_amount ?? $order->amount) * $order->order_quantity;
    @endphp

                <tr>
                    <td>
                        <img src="{{ asset('uploads/' . $order->product_image_path) }}" class="product-img me-2">
                        {{ $order->product_name }}
                    </td>
                    <td>{{ $order->product_category }}</td>
                    <td id="amount">${{ number_format($order->offer_amount ?? $order->amount, 2) }}</td>
                    <td>
                        <input type="number" value="{{ $order->order_quantity }}" class="form-control w-50" id="quan">
                    </td>
                    <td id="total">${{ number_format(($order->offer_amount ?? $order->amount) * $order->order_quantity, 2) }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>

                @endforeach
                          @endif

            </tbody>
        </table>
    </div>
</div>

<!-- Cart Summary -->
<div class="row justify-content-end">
    <div class="col-md-4">
        <div class="card card-summary">
            <div class="card-body">
                <h5 class="mb-3">Order Summary</h5>
                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span id="subtotal">${{$totalValue}}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Shipping</span>
                    <span>$3.00</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold">
                    <span>Grand Total</span>
                    <span id="final_value">${{$totalValue + 3}}</span>
                </div>

                <a href="{{ url('/payment') }}" class="btn btn-primary w-100 mt-3">
    Proceed to Checkout
</a>
            </div>
        </div>
    </div>
</div>
@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function () {
    $('#quan').on('change', function () {
        let quantity = parseFloat($(this).val());
        let amountText = $('#amount').text().trim();
let amount = parseFloat(
    amountText.replace('$', '').replace(/,/g, '')
);

let sum = quantity * amount;
$('#total').text('$' + sum.toFixed(2));
$('#subtotal').text('$' + sum.toFixed(2));
let final_amount = sum + 3;
$('#final_value').text('$' + final_amount.toFixed(2));
    });
});
</script>
