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

Route::get('/', [
    'uses'  => 'Web\HomeController@index',
    'as'    => 'home'
]);
Route::get('/index', 'Web\HomeController@index');
Route::get('/home', 'Web\HomeController@index');
Route::get('/home/index', 'Web\HomeController@index');

Route::get('/home/category/{category}', [
    'uses' => 'Web\HomeController@category',
    'as'   => 'category'
]);

Route::get('/admin', 'Web\AdminController@index');
Route::get('/admin/index', 'Web\AdminController@index')->name('admin.home');
Route::get('/admin/category', 'Web\AdminController@category')->name('admin.category');
Route::get('/admin/product', 'Web\AdminController@product')->name('admin.product');
Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
// Route::get('/home', 'Web\HomeController@index')->name('home');
