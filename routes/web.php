<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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

// Route::get('/landing', function () {
//     return view('welcome');
// });

Route::resource('/homepage','App\Http\Controllers\FrontendController');
Route::get('/productss/{slug}','App\Http\Controllers\FrontendController@show')->name('frontend.singleproduct');
Route::get('/shop','App\Http\Controllers\FrontendController@shop')->name('frontend.shoppage');

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::resource('/user','App\Http\Controllers\UserController');
Route::get('/role/select/{id}','App\Http\Controllers\RoleController@select');
Route::resource('/role','App\Http\Controllers\RoleController');
Route::resource('/banner','App\Http\Controllers\BannerController');
Route::resource('/category','App\Http\Controllers\CategoryController');
Route::resource('/coupon','App\Http\Controllers\CouponController');
Route::resource('/make','App\Http\Controllers\MakeController');
Route::resource('/mechanic','App\Http\Controllers\MechanicController');
Route::resource('/mechanic_request','App\Http\Controllers\MechanicRequestController');
Route::get('/vehicleModel/get/{id}','App\Http\Controllers\VehicleModelController@models');
Route::resource('/model','App\Http\Controllers\VehicleModelController');
Route::resource('/order','App\Http\Controllers\OrderController');

Route::resource('/order_item','App\Http\Controllers\Order_itemController');
Route::resource('/product','App\Http\Controllers\ProductController');
Route::get('/product/{category_id}/{subCategory}','App\Http\Controllers\ProductController@filtered');
Route::post('/process', 'App\Http\Controllers\Controller@process');
Route::resource('/rider','App\Http\Controllers\RiderController');
Route::resource('/spare_request','App\Http\Controllers\Spare_requestController');
Route::get('/subCategory/get/{id}','App\Http\Controllers\SubCategoryController@subCategories');
Route::resource('/subCategory','App\Http\Controllers\SubCategoryController');

















	// Route::resource('/user','App\Http\Controllers\UserController');
	// Route::resource('/product','ProductController');
	// Route::get('/user', [UserController::class, 'index']);
	// Route::get('/role', [RoleController::class, 'index']);
	 // Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
	 // Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
	// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

