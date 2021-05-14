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

Route::get('/service/transaction', 'Api\ServiceController@GetTransaction');
Route::post('/service/transaction', 'Api\ServiceController@PostTransaction');
Route::post('/service/approve', 'Api\ServiceController@PostTransactionApprove');

Route::get('/service/category', 'Api\ServiceController@GetCategory');
Route::get('/service/ddl/category', 'Api\ServiceController@GetCategory');
Route::get('/service/category/{id}', 'Api\ServiceController@GetCategoryById');
Route::post('/service/category', 'Api\ServiceController@PostCategory')->name('api.admin.post.category');
Route::put('/service/category', 'Api\ServiceController@PutCategory')->name('api.admin.put.category');
Route::delete('/service/category/{id}', 'Api\ServiceController@DeleteCategory');

Route::get('/service/product', 'Api\ServiceController@GetProduct');
Route::get('/service/product/{id}', 'Api\ServiceController@GetProductById');
Route::post('/service/product', 'Api\ServiceController@PostProduct')->name('api.admin.post.product');
Route::put('/service/product', 'Api\ServiceController@PutProduct')->name('api.admin.put.product');
Route::delete('/service/product/{id}', 'Api\ServiceController@DeleteProduct');

