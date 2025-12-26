<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Safarionline;

class FileuploadController extends Controller
{
    public function upload(Request $request)
    {
    // Check if file was uploaded
    	$status = 0;
    if ($request->hasFile('file')) {
        
        // Optional: validate file
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        // Access file
        $file = $request->file('file');

        // Optional: check if it's valid
        if ($file->isValid()) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $status = 1;
            return response()->json(['status' => $status, 'file' => $filename]);
        } else {
        	$status = 2;
            return response()->json(['status' => $status]);
        }

    } else {
    	$status = 3;
        return response()->json(['status' => $status]);
    }
}

}
