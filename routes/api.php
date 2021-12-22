<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD
Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::resource('product', 'App\Http\Controllers\ProductController');
=======
Route::resource('category', App\Http\Controllers\CategoryController::class);
// Route::resource('category',App\Http\Controllers\CategoryController::class)->only(['index','store','show','update','destroy']);
>>>>>>> 2e2c608f8211534f9c9210bd29910ef3b1db0142
