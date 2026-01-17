<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Safarionline;
use App\Models\Users_registrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{
    


     public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $validated['status'] = 1;

        // Create a new entry
        Safarionline::create($validated);

        return redirect('/register')->with('success', 'Form submitted successfully!');
    }


   public function loginCustom(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = SafariOnline::where('email', $request->username)->first();

    if ($user && $request->password === $user->password)
    {
        Session::put('safarionline_id', $user->id);
        Session::put('name', $user->username);

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'username' => $user->username // Send back the username
        ]);
    }

    return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
}


 public function Registersubmit(Request $request)
{

   
   $validated = $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20'
        ]);

   $productId = $request->product_id;
   $quantity = $request->quantity;

   
    
      try {
        // Save data to the database
        $user = Users_registrations::create($validated);
          $lastInsertId = $user->id;
        
        $uid = $request->cookie('un');


        DB::table('temporary_order')
    ->where('unique_id', $uid)
    ->update([
        'product_id' => $productId,
        'quantity'   => $quantity,
        'user_id'    => $lastInsertId,
        'updated_at' => now(),
    ]);

     Cookie::queue('emu', $lastInsertId, 60);

        // Return success response
        return response()->json([
            'status'  => true,
            'message' => 'Data saved successfully',
            'data'    => $user,
            'redirect_url' => route('user-dashboard') 
        ]);

    } catch (\Exception $e) {
        // If any error occurs (e.g., DB error), return error response
        return response()->json([
            'status'  => false,
            'message' => 'Failed to save data',
            'error'   => $e->getMessage()
        ], 500);
    }

}




public function DashboardData(Request $request)
    {
         
      $uid = $request->cookie('emu');

       if (!$uid) {
            return view('user-dashbord.dashboard', ['orders' => collect()]);
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
        't.user_id',
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
    ->where('t.user_id', $uid)
    ->get();


       return view('user-dashbord.dashboard', compact('orders'));
     }

}
