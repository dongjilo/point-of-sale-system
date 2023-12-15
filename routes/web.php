<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelIgnition\FlareMiddleware\AddJobs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
 * index - show all
 * show - show one
 * create - show form to create
 * store - save new
 * edit - show form to edit
 * update - save edited
 * destroy - delete
 */

Route::get('/', function () {
    return view('dashboard');
});


// Users
Route::get('/users', [UserController::class, 'index']);

Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/login/auth', [UserController::class, 'authenticate']);

Route::get('/users/edit/{user}', [UserController::class, 'edit']);

Route::put('/users/{user}', [UserController::class, 'update']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('users/{user}', [UserController::class, 'show']);

// Products
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('products/edit/{product}', [ProductController::class, 'edit']);

Route::put('/products/{product}', [ProductController::class, 'update']);

Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/suppliers', [ProductController::class, 'index']);

// suppliers
Route::get('/suppliers', [AdminController::class, 'view_supplier']);

Route::post('/store_supplier', [AdminController::class, 'store_supplier']) -> name('store_supplier');
Route::delete('/suppliers/{supplier}', [AdminController::class, 'destroy_supplier']) -> name('destroy_supplier');
Route::patch('/suppliers/{supplier}', [AdminController::class, 'update_supplier']) -> name('update_supplier');
// suppliers end


