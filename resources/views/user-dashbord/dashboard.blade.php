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
                <tr>
                    <td>
                        <img src="https://via.placeholder.com/60" class="product-img me-2">
                        Bluetooth Headphones
                    </td>
                    <td>Audio</td>
                    <td>$120.00</td>
                    <td>
                        <input type="number" value="1" class="form-control w-50">
                    </td>
                    <td>$120.00</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="https://via.placeholder.com/60" class="product-img me-2">
                        Gaming Mouse
                    </td>
                    <td>Accessories</td>
                    <td>$45.00</td>
                    <td>
                        <input type="number" value="2" class="form-control w-50">
                    </td>
                    <td>$90.00</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>

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
                    <span>$210.00</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Shipping</span>
                    <span>$3.00</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold">
                    <span>Grand Total</span>
                    <span>$213.00</span>
                </div>

                <button class="btn btn-primary w-100 mt-3">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
