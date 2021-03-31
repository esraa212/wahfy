<?php

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

Route::post('/subscribe', 'FrontController@subscribe')->name('front.subscribe');

Route::group(['namespace'=>'Front','as' => 'front.'], function (){

Route::get('/','HomeController@index')->name('home');
Route::get('/customer/login', 'CustomersController@showLoginForm')->name('loginForm');
Route::post('/customer/login', 'CustomersController@login')->name('login');
Route::post('/customer/logout', 'CustomersController@logout')->name('logout');
Route::get('/customer/logout', 'CustomersController@logout')->name('logout');
Route::get('/customer/register', 'CustomersController@registerForm')->name('registerForm');
Route::post('/customer/register', 'CustomersController@register')->name('register');
Route::get('/shop/{industry}', 'IndutriesController@show')->name('indusrty.show');

Route::post('/product_review', 'ProductController@review')->name('review');

Route::get('/Brands/{supplier}', 'SupplierController@index')->name('suppliers.index');
Route::get('/Products/{product}', 'ProductController@product')->name('suppliers.product');
Route::get('/Products/{id}/{value}', 'ProductController@index')->name('products.index');
Route::get('cart', 'ProductController@cart')->name('cart');
Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('addToCart');
Route::get('cart/checkout/{price}', 'ProductController@checkout')->name('checkout');
Route::get('payment/{price}', 'ProductController@checkoutForm')->name('checkoutForm');
//after checkout store order details 
Route::post('/order', 'OrderController@store')->name('order.store');

/*get areas of cities ajax */
Route::get('/get_areas/{city}', 'AjaxController@getAreas')->name('getAreas');
Route::get('/get_suppliers/{id}/{value}', 'AjaxController@getSuppliers')->name('getSuppliers');
Route::get('/get_suppliers_search/{search}', 'AjaxController@getSuppliersBySearch')->name('getSuppliersBySearch');
//filter inside store page for products id 1 for catgory 2 for subcategory 3 for price and 4 for colors
Route::get('/filter_products/{id}/{value}', 'AjaxController@filterProducts')->name('filterProducts');
Route::get('/getSubByCategory/{category}', 'AjaxController@getSubByCategory')->name('getSubCategories');




});


//get subcategory of category
// Route::get('/', function () {
//     return view('welcome');
// });

//dashboard
Route::group(['namespace'=>'Dashboard','as' => 'admin.', 'prefix' => 'dashboard'], function (): void {
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/index', 'DashboardController@index')->name('dashboard');
//    Route::get('/profile', 'Dashboard\Auth\ProfileController@showProfile')->name('profile');
//    Route::post('/profile', 'Dashboard\Auth\ProfileController@profile')->name('profile.post');
    //cities
    Route::resource('cities', 'CitiesController');
    //areas
    Route::resource('areas', 'AreasController');
    //categories
    Route::resource('categories', 'CatgeoriesController');
    //Subcategories
    Route::resource('subCategories', 'SubCategoriesController');
    //industries
    Route::resource('industries', 'IndustriesController');
    //suppliers
    Route::resource('suppliers', 'SuppliersController');
    //Categories for product
    Route::resource('product_categories', 'ProductCategories');
    //SubCategories for product
    Route::resource('product_subCategories', 'ProductSubCategories');
    //products
    Route::resource('products', 'ProductsController');
    //advertisments
    Route::resource('advertisments', 'AdvertismentsCroller');
     //customers
     Route::resource('customers', 'CustomersController');
    //notifications
    Route::resource('notifications', 'NotificationsController');
    //payments
    Route::resource('payments', 'PaymentsController');

    Route::get('favorites','FavoriteProductsController@index')->name('favorites.index');
    Route::get('favorites/show/{id}','FavoriteProductsController@show')->name('favorites.show');

    Route::get('rating','ProductsRatingController@index')->name('rating.index');
    Route::get('rating/show/{id}','ProductsRatingController@show')->name('rating.show');
    //Feedback
    Route::resource('feedback', 'FeedbackController');
//dialog
    Route::get('dialogs','DialogController@index')->name('dialogs.index');
    //Order
    Route::resource('orders','OrdersController');
      //Subscription
    Route::resource('subscriptions','SubscriptionControlller');
    //banners
    Route::resource('banners','BannersController');
    //deals
    Route::resource('deals','DealsController');
    //attributes for product
    Route::resource('attributes','ProductAttributesController');
//colors for products
    Route::resource('colors','ColorController');

    

    // this Cotroller for test hyperpay
    Route::resource('testPayments', 'CheckoutController');
    Route::get('testPayment/checkout/{price}', 'CheckoutController@checkout')->name('products.checkout');
//    Route::get('testPayment/cardForm/{price}', 'CheckoutController@cardForm');



     /*get areas of cities ajax */
     Route::get('get_areas/{city}', 'AjaxController@getAreas')->name('getAreas');

    //get subcategory of category
    Route::get('getSubByCategory/{category}', 'AjaxController@getSubByCategory')->name('getSubCategories');
    Route::get('getProducts/{supplier}', 'AjaxController@getProductsByCategory')->name('getProducts');
    Route::get('getCategories/{supplier}', 'AjaxController@getCategoriesBySupplier')->name('getCategories');
    Route::get('getCategoriesByIndustry/{industry}', 'AjaxController@getCategoriesByIndustry')->name('getCategoriesByIndustry');
    Route::get('getProductSubByCategory/{product_category_id}', 'AjaxController@getProductSubByCategory')->name('getProductSubByCategory');


    Route::any('/not-have-access', function () {
        return view('Dashboard::notAccess');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
