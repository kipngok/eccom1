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

Route::group(['middleware' => ['auth']], function(){
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::resource('/user','App\Http\Controllers\UserController');
Route::get('/role/select/{id}','App\Http\Controllers\RoleController@select');
Route::resource('/role','App\Http\Controllers\RoleController');
Route::resource('/banner','App\Http\Controllers\BannerController');
Route::get('/refreshSlug','App\Http\Controllers\CategoryController@refreshSlug');
Route::resource('/category','App\Http\Controllers\CategoryController');
Route::resource('/coupon','App\Http\Controllers\CouponController');
Route::resource('/make','App\Http\Controllers\MakeController');
Route::resource('/mechanic','App\Http\Controllers\MechanicController');
Route::resource('/mechanic_request','App\Http\Controllers\MechanicRequestController');
Route::resource('/model','App\Http\Controllers\VehicleModelController');
Route::get('/pending','App\Http\Controllers\OrderController@pending');
Route::get('/complete','App\Http\Controllers\OrderController@complete');
Route::get('/delivery','App\Http\Controllers\OrderController@delivery');
Route::get('/affiliate','App\Http\Controllers\OrderController@affiliate');
Route::get('/registerRider','App\Http\Controllers\RiderController@registerRider');
Route::resource('/order_item','App\Http\Controllers\Order_itemController');
Route::resource('/product','App\Http\Controllers\ProductController');
Route::get('/product/{category_id}/{subCategory}','App\Http\Controllers\ProductController@filtered');
Route::post('/process', 'App\Http\Controllers\Controller@process');
Route::resource('/rider','App\Http\Controllers\RiderController');
Route::resource('/spareRequest','App\Http\Controllers\SpareRequestController');
Route::resource('/subCategory','App\Http\Controllers\SubCategoryController');
Route::resource('/review','App\Http\Controllers\ReviewController');
Route::resource('/partner','App\Http\Controllers\PartnerController');
});


Auth::routes();
Route::get('/vehicleModel/get/{id}','App\Http\Controllers\VehicleModelController@models');
Route::get('/subCategory/get/{id}','App\Http\Controllers\SubCategoryController@subCategories');
Route::resource('/homepage','App\Http\Controllers\FrontendController');
Route::resource('/order','App\Http\Controllers\OrderController');
Route::get('/shop','App\Http\Controllers\FrontendController@shop')->name('frontend.shoppage');
Route::get('/sparepart/category/{slug}','App\Http\Controllers\FrontendController@category');
Route::get('/sparepart/{slug}','App\Http\Controllers\FrontendController@singleproduct');
Route::get('/requestSpare','App\Http\Controllers\FrontendController@requestSpare');
Route::post('/requestSpare','App\Http\Controllers\FrontendController@storeSpareRequest');
Route::post('/search','App\Http\Controllers\FrontendController@search');
Route::post('/filter','App\Http\Controllers\FrontendController@filter');
Route::post('/contact','App\Http\Controllers\FrontendController@sendMessage');
Route::get('/contact','App\Http\Controllers\FrontendController@contact');
Route::get('/help','App\Http\Controllers\FrontendController@help');
Route::get('/return','App\Http\Controllers\FrontendController@return');
Route::get('/terms','App\Http\Controllers\FrontendController@terms');
Route::get('/privacy','App\Http\Controllers\FrontendController@privacy');
Route::get('/about','App\Http\Controllers\FrontendController@about');
Route::get('/','App\Http\Controllers\FrontendController@welcome');
Route::post('/cartAjax/{product}', 'App\Http\Controllers\CartController@storeAjax')->name('cart.storeAjax');
Route::post('/couponCheck', 'App\Http\Controllers\CouponController@check');
Route::post('/removeAjax', 'App\Http\Controllers\CartController@removeAjax')->name('cart.removeAjax');
Route::post('/removeAjaxPage', 'App\Http\Controllers\CartController@removeAjaxPage')->name('cart.removeAjaxPage');
Route::post('/updateAjaxPage', 'App\Http\Controllers\CartController@updateAjaxPage')->name('cart.updateAjaxPage');
Route::get('/cartGet','App\Http\Controllers\CartController@cartGet');
Route::get('/cartGetPage','App\Http\Controllers\CartController@cartGetPage');
Route::get('/getTotals','App\Http\Controllers\CartController@getTotals');
Route::resource('/cart','App\Http\Controllers\CartController');
Route::resource('/checkout','App\Http\Controllers\CheckoutController');
Route::resource('/payment','App\Http\Controllers\PaymentController');
Route::get('/order/payment/success/{id}','App\Http\Controllers\PaymentController@success');
Route::get('/order/payment/fail/{id}','App\Http\Controllers\PaymentController@fail');
Route::get('/order/payment/confirmed/{id}','App\Http\Controllers\PaymentController@confirmed');
Route::post('/cod/{id}','App\Http\Controllers\PaymentController@cod');
//GOOGLE MAPS
Route::get('/googleMaps/search','App\Http\Controllers\GoogleMapsController@search');
Route::get('/getCordinates/{place_id}','App\Http\Controllers\GoogleMapsController@getCordinates');

Route::get('/paymentSuccess/{id}','App\Http\Controllers\PaymentController@paymentSuccess');
