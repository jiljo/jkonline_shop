<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Safarionline;
use App\Models\Users_registrations;
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


    
      try {
        // Save data to the database
        $user = Users_registrations::create($validated);

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
}
