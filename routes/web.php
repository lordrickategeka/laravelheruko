<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);

Route::delete('myproductsDeleteAll', [ProductController::class, 'deleteAll']);
// Route::get('myproducts', [ProductController::class, 'index']);
// Route::delete('myproducts/{id}', [ProductController::class, 'destroy']);
// Route::delete('myproductsDeleteAll', [ProductController::class, 'deleteAll']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// notification
Route::get('/', [BillController::class, 'sendNotification']);