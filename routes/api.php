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

Route::get('/service/category', 'Api\ServiceController@GetCategory');
Route::get('/service/category/{id}', 'Api\ServiceController@GetCategoryById');
Route::post('/service/category', 'Api\ServiceController@PostCategory')->name('admin.post.category');
Route::put('/service/category', 'Api\ServiceController@PutCategory')->name('admin.put.category');
Route::delete('/service/category/{id}', 'Api\ServiceController@DeleteCategory');

Route::get('/service/product', 'Api\ServiceController@GetProduct');
Route::post('/service/product', 'Api\ServiceController@PostProduct');
