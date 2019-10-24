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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
///Category
Route::get('/category', 'HomeController@category')->name('category');
Route::post('/saveNewCategory', 'HomeController@saveNewCategory')->name('saveNewCategory');
Route::get('/changeCategoryActivation/{id}/{currentActivation}', 'HomeController@changeCategoryActivation')->name('changeCategoryActivation');
Route::get('/deleteCategory/{id}', 'HomeController@deleteCategory')->name('deleteCategory');
Route::get('/categoryEdit/{id}', 'HomeController@categoryEdit')->name('categoryEdit');
Route::post('/saveEditedCategory', 'HomeController@saveEditedCategory')->name('saveEditedCategory');
///Supplier
Route::get('/supplier', 'HomeController@supplier')->name('supplier');
Route::post('/saveNewSupplier', 'HomeController@saveNewSupplier')->name('saveNewSupplier');
Route::get('/changeSupplierActivation/{id}/{currentActivation}', 'HomeController@changeSupplierActivation')->name('changeSupplierActivation');
Route::get('/deleteSupplier/{id}', 'HomeController@deleteSupplier')->name('deleteSupplier');
Route::get('/supplierEdit/{id}', 'HomeController@supplierEdit')->name('supplierEdit');
Route::post('/saveEditedSupplier', 'HomeController@saveEditedSupplier')->name('saveEditedSupplier');
///Stock
Route::get('/products', 'HomeController@products')->name('products');
Route::post('/saveNewProduct', 'HomeController@saveNewProduct')->name('saveNewProduct');
Route::post('/getProductName', 'HomeController@getProductName');
Route::get('/stockManager', 'HomeController@stockManager')->name('stockManager');
Route::post('/saveNewStock', 'HomeController@saveNewStock')->name('saveNewStock');
Route::get('/stockEdit/{id}', 'HomeController@stockEdit')->name('stockEdit');
Route::post('/saveEditedStock', 'HomeController@saveEditedStock')->name('saveEditedStock');
Route::get('/deleteStock/{id}', 'HomeController@deleteStock')->name('deleteStock');
Route::get('/viewStock', 'HomeController@viewStock')->name('viewStock');

Route::post('/getBuingPrice', 'HomeController@getBuingPrice');
Route::post('/getSellingPrice', 'HomeController@getSellingPrice');
Route::post('/getProducts', 'HomeController@getProducts');
Route::post('/getquantity', 'HomeController@getquantity');
Route::post('/saveSellQueue', 'HomeController@saveSellQueue')->name('saveSellQueue');
Route::get('/saleProduct', 'HomeController@saleProduct')->name('saleProduct');

Route::get('/queue', 'HomeController@queue')->name('queue');
