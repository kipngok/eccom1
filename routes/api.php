<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/products','App\Http\Controllers\Api\FrontendController@index', ['as'=> 'api']);
Route::post('/search','App\Http\Controllers\Api\FrontendController@search', ['as'=> 'api']);
Route::resource('/spareRequest','App\Http\Controllers\Api\SpareRequestController', ['as'=> 'api']);
Route::get('/cart','App\Http\Controllers\Api\CartController@index', ['as'=> 'api']);
Route::get('/cart','App\Http\Controllers\Api\CartController@index', ['as'=> 'api']);
Route::post('/storeCart','App\Http\Controllers\Api\CartController@storeAjax', ['as'=> 'api']);
Route::post('/removeCart','App\Http\Controllers\Api\CartController@removeAjax', ['as'=> 'api']);
Route::resource('/banner','App\Http\Controllers\Api\BannerController', ['as'=> 'api']);
Route::get('/pendingOrder','App\Http\Controllers\Api\OrderController@pending', ['as'=> 'api']);
Route::get('/thumbBanner','App\Http\Controllers\Api\FrontendController@thumbBanner', ['as'=> 'api']);
Route::get('/featuredMake','App\Http\Controllers\Api\FrontendController@featuredMake', ['as'=> 'api']);
Route::get('/categories','App\Http\Controllers\Api\FrontendController@categories', ['as'=> 'api']);
Route::post('/stkPush','App\Http\Controllers\MpesaController@customerMpesaSTKPush');
Route::post('/order/payment/confirmed/{id}','App\Http\Controllers\MpesaController@confirmedMpesaPayment');
Route::get('/registerUrl','App\Http\Controllers\MpesaController@mpesaRegisterUrls');
Route::post('/transaction/confirmation','App\Http\Controllers\MpesaController@mpesaConfirmation');
Route::post('/validation','App\Http\Controllers\MpesaController@mpesaValidation');
Route::get('/newproduct','App\Http\Controllers\Api\FrontendController@newproduct', ['as'=> 'api']);
Route::get('/featuredproduct','App\Http\Controllers\Api\FrontendController@featuredproduct', ['as'=> 'api']);
Route::get('/singleProduct/{id}','App\Http\Controllers\Api\FrontendController@singleProduct', ['as'=> 'api']);
Route::resource('/make','App\Http\Controllers\Api\MakeController', ['as'=> 'api']);
Route::post('/orderItem/save','App\Http\Controllers\Api\OrderItemController@store', ['as'=> 'api']);
Route::resource('/category','App\Http\Controllers\Api\CategoryController', ['as'=> 'api']);
Route::resource('/subCategory','App\Http\Controllers\Api\SubCategoryController', ['as'=> 'api']);

Route::group(['middleware' => ['json.response','cors']], function () {

Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::get('/filters','App\Http\Controllers\Api\FrontendController@filterMake', ['as'=> 'api']);
Route::get('/filters/subcategories/{id}','App\Http\Controllers\Api\FrontendController@filterSubCategories', ['as'=> 'api']);
Route::get('/filters/models/{id}','App\Http\Controllers\Api\FrontendController@filterModels', ['as'=> 'api']);

Route::middleware('auth:api')->group(function () {
    Route::get('/logout', 'App\Http\Controllers\Api\AuthController@logout');
// Route::resource('/banner','App\Http\Controllers\Api\BannerController', ['as'=> 'api']);
// Route::resource('/category','App\Http\Controllers\Api\CategoryController', ['as'=> 'api']);
// Route::resource('/subCategory','App\Http\Controllers\Api\SubCategoryController', ['as'=> 'api']);
Route::get('/subCategory/get/{id}','App\Http\Controllers\SubCategoryController@subCategories',['as'=> 'api']);
Route::resource('/product','App\Http\Controllers\Api\ProductController', ['as'=> 'api']);
Route::resource('/rider','App\Http\Controllers\Api\RiderController', ['as'=> 'api']);
Route::resource('/orderItem','App\Http\Controllers\Api\OrderItemController', ['as'=> 'api']);
Route::resource('/order','App\Http\Controllers\Api\OrderController', ['as'=> 'api']);
Route::resource('/store','App\Http\Controllers\Api\StoreController', ['as'=> 'api']);
Route::get('/allOrders','App\Http\Controllers\Api\OrderController@allOrders', ['as'=> 'api']);
Route::get('/singleOrder/{id}','App\Http\Controllers\Api\OrderController@singleOrder', ['as'=> 'api']);
Route::get('/pendingOrder','App\Http\Controllers\Api\OrderController@pending', ['as'=> 'api']);
Route::get('/completeOrder','App\Http\Controllers\Api\OrderController@complete', ['as'=> 'api']);
Route::resource('/delivery','App\Http\Controllers\Api\DeliveryController', ['as'=> 'api']);
Route::post('/review','App\Http\Controllers\Api\ReviewController@store', ['as'=> 'api']);
// Route::resource('/make','App\Http\Controllers\Api\MakeController', ['as'=> 'api']);
Route::resource('/vehicleModel','App\Http\Controllers\Api\VehicleModelController', ['as'=> 'api']);
Route::get('/vehicleModel/get/{id}','App\Http\Controllers\VehicleModelController@models');
Route::get('/showUser/{id}','App\Http\Controllers\Api\UserController@showUser', ['as'=> 'api']);
Route::resource('/updateUser','App\Http\Controllers\Api\UserController', ['as'=> 'api']);
// Route::resource('/frontend','App\Http\Controllers\Api\FrontendController', ['as'=> 'api']);

Route::post('/spareRequest','App\Http\Controllers\Api\FrontendController@storeSpareRequest', ['as'=> 'api']);

Route::post('/cod/{id}','App\Http\Controllers\Api\PaymentController@cod');



// Route::post('/couponCheck', 'App\Http\Controllers\Api\CouponController@check' ,['as'=> 'api']);

       
});
});

