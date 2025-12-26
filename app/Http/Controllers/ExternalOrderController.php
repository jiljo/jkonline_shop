<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

use App\Models\ExternalorderModel;




class ExternalOrderController extends Controller
{
    public function saveOrder(Request $request)
    {
        $quantity = $request->input('quantity');
        $pid = $request->input('pid');
        $randomNumber = rand(10000, 99999);


        // You can process or save to DB here
        // Example: save as cookie
        Cookie::queue('un', $randomNumber, 60);


       // Save to database
    $tempOrder = ExternalorderModel::create([
        'unique_id' => $randomNumber,
        'product_id' => $pid,
        'quantity' => $quantity,
    ]);

     return response()->json([
    'success' => true,
    'message' => 'Temporary order saved successfully!',
    'redirect_url' => url('ecommerce/externalcart')
]);
       
   
}

public function FetchtemporaryOrder(Request $request)
    {
         
      $uid = $request->cookie('un');

       if (!$uid) {
            return view('ecommerce.externalcart', ['orders' => collect()]);
        }
            

       // $orders = ExternalorderModel::where('unique_id',$uid)->get();

        $orders = DB::table('temporary_order as t')
    ->join('products as p', 't.product_id', '=', 'p.pid')
    ->select(
        't.tid',
        't.unique_id',
        't.product_id',
        't.quantity as order_quantity',
        't.created_at as order_created_at',
        't.updated_at as order_updated_at',
        'p.product_name',
        'p.product_category',
        'p.amount',
        'p.offer_amount',
        'p.product_image_path',
        'p.product_specification',
        'p.status',
        'p.created_at as product_created_at',
        'p.updated_at as product_updated_at',
        'p.more_photos'
    )
    ->where('t.unique_id', $uid)
    ->get();


       return view('ecommerce.externalcart', compact('orders'));
     }
}
