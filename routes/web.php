<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileuploadController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\ExternalOrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});


Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dashboard', function () {
	 if (!Session::has('safarionline_id'))
	  {
	  	 return redirect('/index')->with('error', 'Please login first');
	  }
	  else
	  {
      return view('dashboard');
  }
})->name('dashboard');

Route::post('/form-submit',[LoginController::class,'save'])->name('form-submit');
Route::post('/custom-login', [LoginController::class, 'loginCustom'])->name('login.custom');


Route::get('/add-product', function () {
    return view('add-product');
})->name('add-product');


Route::get('/logout', function () {
    Session::flush(); // Destroys all session data
    return redirect('/index'); // Redirect to login page
})->name('logout');

Route::post('/upload-files',[FileuploadController::class,'upload'])->name('upload-files');
Route::post('/save-product',[AdminController::class,'save_product'])->name('save-product');

Route::get('/view-product', function ()
{
   $pageName = 'View Product';
  return view('view-product', ['pageName' => $pageName]);
})->name('view-product');
Route::get('/get-products', [AdminController::class, 'getProducts']);

Route::get('/edit-product/{id}', [AdminController::class, 'edit'])->name('edit-product');


Route::get('/vpo', function () {
    return view('prodictedit');
})->name('vpo');

Route::post('/update-product',[AdminController::class, 'update_product'])->name('update-product');



Route::get('/shop', function () {
    $controller = app(AdminController::class);
   // $products = $controller->getAllProducts()->resolve();  // get API data
$products = $controller->getAllProducts();
    // If getAllProducts returns a Response object, extract data like this:
    // $products = $products->getData();



    return view('ecommerce.index2', ['products' => $products]);
});

Route::get('/view_item/{id}', [AdminController::class, 'product_view'])->name('view_ite');

Route::post('/save-order', [ExternalOrderController::class, 'saveOrder']);

Route::get('/ecommerce/externalcart', [ExternalOrderController::class, 'FetchtemporaryOrder'])->name('externalcart');

/*

study */
/*
Route::get('/saving', [AdminController::class, 'saving']);
Route::get('/get_saving', [AdminController::class, 'get_saving']);
Route::get('/update_saving', [AdminController::class, 'update_saving']);
Route::get('/delete_saving', [AdminController::class, 'delete_saving']);


*/

