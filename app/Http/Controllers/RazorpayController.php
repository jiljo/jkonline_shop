<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function store(Request $request)
    {
        $api = new Api(config('razorpay.key'), config('razorpay.secret'));

        $order = $api->order->create([
            'receipt'         => uniqid(),
            'amount'          => $request->amount * 100, // paise
            'currency'        => 'INR'
        ]);

        return response()->json([
            'order_id' => $order['id'],
            'amount'   => $request->amount,
            'key'      => config('razorpay.key')
        ]);
    }

    public function success(Request $request)
    {
        // Payment success response
        return response()->json([
            'status' => 'Payment Successful',
            'data' => $request->all()
        ]);
    }
}
