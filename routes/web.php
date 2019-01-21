<?php

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
/*MAIN VIEWS*/
Route::get('/', 'FrontController@index')->name('home');
Route::get('/home', 'FrontController@index')->name('home');
Route::get('/om-oss', 'FrontController@about')->name('about');
Route::get('/anne', 'FrontController@anne')->name('anne');
Route::get('/page-down', 'FrontController@downPage')->name('downPage');
Route::get('/adminlogin', 'SessionsController@adminLogin');
Route::post('/adminlogin', 'SessionsController@storeAdminLogin');
Route::post('/postnr', 'FrontController@checkPostnr')->name('front.postnr');
/*PRODUCT VIEWS*/

//Route::get('/product', 'ProductController@show')->name('product');
Route::get('/products', 'FrontController@product');
Route::get('/category/{id}', 'CategoryController@showProducts');

Route::get('restauranter/{id}', 'UserController@showClient');

/*CREDIT ROUTES*/
Route::get('/kreditter', 'CreditController@index')->name('getCredit');
Route::get('kreditter/{amount}', 'CreditController@create')->middleware('auth')->name('credit.buy');
Route::post('kreditter/kjøp/{amount}', 'CreditController@store')->middleware('auth')->name('credit.store');
/*USER*/
Auth::routes();
Route::get('/login', 'SessionsController@login')->middleware('guest');
Route::post('login', [ 'as' => 'login', 'uses' => 'SessionsController@store'])->middleware('guest');
Route::get('/register', 'RegistrationController@register')->name('register')->middleware('guest');
Route::post('/register', 'RegistrationController@store')->middleware('guest');
Route::get('/logout', 'SessionsController@logout')->name('logout')->middleware('auth');
Route::get('register/verify/resend', 'UserController@sendNewVerificationEmail')->name('sendNewVerificationEmail');
Route::get('user/verify/', 'FrontController@unverified')->name('auth.verify');
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UserController@confirm'
])->name('confirm');
Route::get('/user/order/{id}', 'FrontController@userOrder')->middleware('auth')->name('user.order');
      //FACEBOOK login
      Route::get('auth/{provider}', 'SocialAuthController@redirect');
      Route::get('auth/{provider}/callback', 'SocialAuthController@callback');


Route::get('user/address-update', 'UserController@editAddress')->name('user.editShipping')->middleware('auth');
Route::post('user/address', 'UserController@storeAddress')->name('user.storeAddress')->middleware('auth');
Route::get('user/forgot-password', 'Auth\ForgotPasswordController@index')->name('forgotPassword');

/*CART*/

Route::post('/cart/add-item/{id}','CartController@addItem')->name('cart.addItem');
Route::get('/cart/destroy', 'CartController@destroyCart')->name('destroy.cart');
Route::get('cart/get', 'CartController@cartGet');
Route::post('/cart/form/{id}','CartController@postCartForm')->name('postCartForm');
Route::get('/cart/post/{id}','CartController@postCart')->name('postCart');
Route::get('/cart/plus/{id}','CartController@cartPlus')->name('cartPlus');
Route::get('/cart/minus/{id}','CartController@cartminus')->name('cartMinus');

Route::resource('/cart', 'CartController');

/*ADMIN*/
Route::group(['prefix' => 'admin','middleware' => ['auth','admin']], function () {

    Route::post('toggleDeliever/{orderId}', 'OrderController@toggleDeliver')->name('toggle.deliver');

    Route::get('/', function() {
      return view('admin.index');
    })->name('admin.index');

    Route::resource('product', 'ProductController');
    Route::get('/products', 'ProductController@index')->name('admin.product.index');
    Route::get('/products/{id}/edit', 'ProductController@edit')->name('editProductAdmin');
    Route::post('/product/{id}/update', 'ProductController@update')->name('updateProductAdmin');
    Route::resource('category', 'CategoryController');

    Route::get('orders/{delivered?}', 'OrderController@orders');

    Route::resource('postnr', 'PostnrController');

    Route::get('/users', 'UserController@getUsers')->name('admin.user');
    Route::get('/users/action', 'AjaxController@userAction')->name('live_search.action');

    Route::get('/users/create', 'UserController@createUser')->name('admin.user.create');
    Route::post('/users/create', 'UserController@saveUser')->name('admin.user.save');

    Route::get('/users/destroy/{id}', 'UserController@getDestroyUser')->name('admin.user.getDestroy');
    Route::post('/destroy/user/{id}', 'UserController@destroyUser')->name('admin.destroy.user');

    Route::get('/users/edit/{id}', 'UserController@editUser')->name('admin.user.edit');
    Route::post('/users/update/{id}', 'UserController@updateUser')->name('admin.user.update');

    Route::get('/users/search/{type}', 'UserController@searchUser')->name('admin.user.search');

    Route::post('/product/create/store', 'ProductController@store')->name('product.store');

    Route::get('/password', 'AdminController@getAdminPassword')->name('admin.password');
    Route::post('/password/admin', 'AdminController@saveAdminPassword')->name('admin.savePassword');

    Route::get('/website-status', 'AdminController@websiteStatus')->name('admin.website-status');
    Route::post('/website-status', 'AdminController@websiteStatusToggle')->name('admin.website-status.toggle');
});

/*CLIENT*/
Route::group(['prefix' => 'client','middleware' => ['auth','client']], function () {


Route::get('/', function() {
  return view('admin.index');
})->name('client.index');

Route::get('/products', 'ProductController@index')->name('admin.product.index');

/*HEADER IMG FOR CLIENTS*/
Route::get('/headerimg', 'HeaderimgController@clientHeaderImg')->name('client.getHeaderImg');
Route::post('/headerimage', 'HeaderimgController@saveHeaderImg')->name('client.saveHeaderImg');
Route::post('/headerimage/destroy', 'HeaderimgController@destroyHeaderImg')->name('client.destroyHeaderImg');
});
/*CLIENT AND ADMIN PRODUCTS*/

//Route::resource('product', 'ProductController');
//Route::post('/product/create/store', 'ProductController@store')->name('product.store');

//Route::post('/product/{id}/update', 'ProductController@update')->name('updateProduct');


/*CHECKOUT*/
//Route::get('/checkout','CheckoutController@step1');
Route::group(['middleware' => 'auth'], function () {
    Route::get('shipping-info','CheckoutController@shipping')->name('checkout.shipping');
});
Route::get('/checkout/order-type', 'CheckoutController@orderType')->name('checkout.orderType');

/*PAYMENT*/
Route::get('/payment/{type}','CheckoutController@payment')->name('checkout.payment')->middleware('auth');
Route::post('/store-payment/{type}','CheckoutController@storePayment')->name('payment.store');
Route::post('/store-payment/credits','CheckoutController@storeCreditPayment')->name('payment.store.credit');

/*Car*/
Route::get('/car-logo', 'FrontController@getCar');



/*DRIVER*/
Route::get('/driver', 'DriverController@index')->middleware('driver');
Route::get('/driver/orders/{type?}', 'DriverController@orders')->middleware('driver');
Route::post('/driver/toggleDeliever/{orderId}', 'DriverController@toggleDeliver')->name('toggle.deliver')->middleware('driver');

/*AJAX*/
Route::get('/users', 'UserController@getUsers')->name('admin.user');
Route::get('/users/action', 'AjaxController@userAction')->name('live_search.action');

Route::get('/postnr/search', 'AjaxController@searchPostnr')->name('postnr.search');

Route::get('/products/search', 'FrontController@searchProducts')->name('searchProducts');

Route::get('/ajax/test', 'AjaxController@testIndex');
Route::get('/bar/{id}', 'AjaxController@cartBarPost');
