<?php
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\CartController;

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

Auth::routes();

//Home route
Route::get('/',function(){
    return view('home.index',['categories'=>Category::all()]);
})->name('home.index');

// Show All Products
Route::resource('/products',ProductContoller::class);

// Show Details of product
Route::get('/details', [ProductContoller::class, 'showSingle'])->name('single.product');

//Admin Routs
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard',[FrontendController::class , 'index']);// go to Dashboard Panel
    Route::get('/categories',[CategoryController::class , 'index']);// Show the Category
    Route::get('/add-category',[CategoryController::class , 'add']);// go to category form
    Route::post('/insert-category',[CategoryController::class , 'insert']);//send category data to category table
    Route::post('/delete-cat',[CategoryController::class , 'deletecat']);//to delet the category
    Route::get('/showtemps',[CategoryController::class , 'showrequests']);// show requersts
    Route::post('/accept',[CategoryController::class , 'acceptrequests']);// accept a request
    Route::post('/delete',[CategoryController::class , 'deleterequests']);// delete a request
    Route::get('/orders',[CategoryController::class , 'orderequests']);// to show all orders
    // -1- the middleware admin will excute before the function 
    // -2- without using middleware admin will ocurr an error Single header...
});

// Add A Product
Route::get('/add-product',function(){
    $msg='';
    return view('addproduct',['categories'=>Category::all(),'message'=>$msg]);
})->name('addproduct');
Route::post('/insert-product',[ProductContoller::class , 'temp_create']);

// Show Added Products 
Route::get('/showp', [ProductContoller::class, 'showtemps']);

// (Updata / Delete) Products
Route::post('/update',[ProductContoller::class , 'update_temp']);
Route::post('/deletetemp',[ProductContoller::class , 'delete_temp']);

// Add A Comment
Route::get('/addcomment', [ProductContoller::class, 'addcomment'])->name('addcomment');
Route::post('//insert.comment',[ProductContoller::class , 'insertcomment']);

// Add To Cart 
Route::get('/cart', [ProductContoller::class, 'cartShow'])->name('cart.show');
Route::post('/updatecart',[CartController::class , 'addToCart']); // addToCart Will excute when you click updateCart botton


// Buy A Product
Route::get('/ord',function(){
    return view('order',['message'=>'']);
});
Route::post('/order',[CartController::class , 'buy']);

// Confirm Buy Process
Route::post('/confirm.order',[ProductContoller::class , 'confirm']);
