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
Route::get('/','Front\HomeController@index')->name('front.home');
Route::get('/customer/login', 'Front\CustomersController@showLoginForm')->name('front.loginForm');
Route::post('/customer/login', 'Front\CustomersController@login')->name('front.login');
Route::post('/customer/logout', 'Front\CustomersController@logout')->name('front.logout');
Route::get('/customer/logout', 'Front\CustomersController@logout')->name('front.logout');
Route::get('/customer/register', 'Front\CustomersController@registerForm')->name('front.registerForm');
Route::post('/customer/register', 'Front\CustomersController@register')->name('front.register');
Route::get('/shop/{industry}', 'Front\IndutriesController@show')->name('indusrty.show');
Route::post('/subscribe', 'FrontController@subscribe')->name('front.subscribe');
Route::get('/Brands/{supplier}', 'Front\SupplierController@index')->name('front.suppliers.index');
Route::get('/Products/{product}', 'Front\SupplierController@product')->name('front.suppliers.product');






     /*get areas of cities ajax */
     Route::get('/get_areas/{city}', 'Front\AjaxController@getAreas')->name('front.getAreas');
     Route::get('/get_suppliers/{area}', 'Front\AjaxController@getSuppliers')->name('front.getSuppliers');
     Route::get('/get_suppliers_search/{search}', 'Front\AjaxController@getSuppliersBySearch')->name('front.getSuppliersBySearch');
     //filter inside store page for products id 1 for catgory 2 for subcategory 3 for price and 4 for colors
     Route::get('/filter_products/{id}/{value}', 'Front\AjaxController@filterProducts')->name('front.filterProducts');






//get subcategory of category
    Route::get('/getSubByCategory/{category}', 'Front\AjaxController@getSubByCategory')->name('front.getSubCategories');
// Route::get('/', function () {
//     return view('welcome');
// });

//dashboard
Route::group(['namespace'=>'Dashboard','as' => 'admin.', 'prefix' => 'dashboard'], function (): void {
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
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

    //for test hyperpay
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
