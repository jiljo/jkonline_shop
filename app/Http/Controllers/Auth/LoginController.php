<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
