<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);


Route::middleware(['auth'])->group(function (){
    // Users
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/register', [UserController::class, 'create']);

    Route::post('/users', [UserController::class, 'store']);

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

// Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/fetch', [CartController::class, 'fetchAll']);

    Route::post('/add-to-cart', [CartController::class, 'add-to-cart']);
});



