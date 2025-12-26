<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;
use App\Models\teststudents;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    //


    public function save_product(Request $request)
{
    $validated = $request->validate([
        'category' => 'required|string|max:250',
        'name' => 'required|string|max:600',
        'amount' => 'required|string|max:250',
        'offer_amount' => 'required|string|max:250',
        'filepath' => 'nullable|string|max:100',
        'quantity' => 'required|string|max:100',
        'specifications' => 'required|string',
    ]);

    $product = AdminModel::saveProduct($validated);

   // return response()->json(['success' => true, 'id' => $product->id]);

    if ($product) {
        return response()->json(['status' => 1, 'id' => $product->id]);
    } else {
        return response()->json(['status' => 0, 'message' => 'Failed to save product']);
    }


}


public function getProducts()
    {
        // You can use pagination in DB if needed, but here we fetch all
        $products = AdminModel::select('pid', 'product_name','product_category', 'amount', 'product_specification','product_image_path')->get();

        return response()->json($products);
    }

public function edit($id)
    {
        $product = DB::table('products')->where('pid', $id)->first();

      //  print_r($product);
      return view('prodictedit', compact('product'));

    }



     public function update_product(Request $request)
             {
    $validated = $request->validate([
        'category' => 'required|string|max:250',
        'name' => 'required|string|max:600',
        'amount' => 'required|string|max:250',
        'offer_amount' => 'required|string|max:250',
        'filepath' => 'nullable|string|max:100',
         'uploaded_images' => 'nullable|string|max:2000',
          'filepath' => 'nullable|string|max:100',
        'specifications' => 'required|string',
          'quantity' => 'required|string|max:250'
    ]);
   
    $id= $request->pid;

   $product = DB::table('products')
    ->where('pid', $request->pid) // make sure this is passed in the request
    ->update([
        'product_category' => $validated['category'],
        'product_name' => $validated['name'],
        'amount' => $validated['amount'],
         'offer_amount' => $validated['offer_amount'],
        'product_image_path' => $validated['filepath'], // nullable
         'more_photos' => $validated['uploaded_images'], // nullable
        'product_specification' => $validated['specifications'],
        'quantity' => $validated['quantity'],
        'updated_at' => now(), // if using timestamps
    ]);

    if ($product) {
        return response()->json(['status' => 1]);
    } else {
        return response()->json(['status' => 0, 'message' => 'Failed to save product']);
    }


}
public function getAllProducts()
{
$products = AdminModel::all()->toArray(); 
return $products;
//return ProductResource::collection($products);
}

/* studying */

public function saving()
{
$save = teststudents::saveStudent();
if($save)
{
    echo "SAVED";
}
else
{
    echo "NOT SAVED";
}
}



public function get_saving()
{
$teststudents = teststudents::all();

//print_r($teststudents);
$teststudents1 = teststudents::find(1);

$teststudents2 = teststudents::findOrFail(1);

$teststudents2 = teststudents::where('email', 'loid@yopmail.com')->first();

//$teststudents1 = teststudents::find(1);
print_r($teststudents2);
}

public function update_saving()
{
$user = teststudents::find(1);
$user->name = "jiljokg@yopmail.com";
//$user->save();

teststudents::where('email', 'ablin123@yopmail.com')->update(['name' => 'Ablin jiljo']);
}

public function delete_saving()
{
$user = teststudents::find(1);
$user->name = "jiljokg@yopmail.com";
//$user->save();

teststudents::where('email', 'loid@yopmail.com')->delete();
}

public function product_view($id)
    {
         $realId = Crypt::decryptString($id);
         $product = AdminModel::where('pid', $realId)->first();
           return view('ecommerce.product_details', compact('product'));
    }






}
