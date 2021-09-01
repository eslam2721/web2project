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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Catshow','categoryController@show' )->name('show');
Route::get('/product/proview/{id}','productController@show' );
Route::get('/product/delete/{id}','productController@delete' )->name('delproduct');


Route::get('/addproduct','productController@add_product' )->name('add');
Route::post('/addproductnew','productController@add_new_product' );

Route::get('/editproduct/{id}','productController@edit_old_product' )->name('editoldproduct');
Route::post('/editproductnew/{id}','productController@edit_product' )->name('editproduct');

Route::get('/addcategory','categoryController@add_category' )->name('addcategory');
Route::post('/addcategorynew','categoryController@add_new_category' )->name('addnewcategory');
Route::get('/category/delete/{id}','categoryController@delete' )->name('delcategory');


Route::get('/addtocart/{id}','productController@add_to_cart' )->name('addtocart');
Route::get('/cart', 'productController@cart')->name('showcart');