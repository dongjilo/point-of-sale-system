<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
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

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');


Route::get('test', function () {
    return view('orders.create');
});



Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {
        return view('dashboard');
    });

    // Users
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/users/edit/{user}', [UserController::class, 'edit']);


Route::post('/logout', [UserController::class, 'logout']);

Route::get('users/{user}', [UserController::class, 'show']);


// Products
Route::get('/products', [AdminController::class, 'view_product']);
Route::post('/store_product', [AdminController::class, 'store_product']) -> name('store_product');
Route::delete('/products/delete/{product}', [AdminController::class, 'destroy_product']) -> name('destroy_product');
Route::patch('/products/update/{product}', [AdminController::class, 'update_product']) -> name('update_product');
// products end

// suppliers
Route::get('/suppliers', [AdminController::class, 'view_supplier']);
Route::post('/store_supplier', [AdminController::class, 'store_supplier']) -> name('store_supplier');
Route::delete('/suppliers/delete/{supplier}', [AdminController::class, 'destroy_supplier']) -> name('destroy_supplier');
Route::patch('/suppliers/update/{supplier}', [AdminController::class, 'update_supplier']) -> name('update_supplier');
// suppliers end

// categories
Route::get('/categories', [AdminController::class, 'view_category']);
Route::post('/store_category', [AdminController::class, 'store_category']) -> name('store_category');
Route::delete('/categories/delete/{category}', [AdminController::class, 'destroy_category']) -> name('destroy_category');
Route::patch('/categories/update/{category}', [AdminController::class, 'update_category']) -> name('update_category');
// categories end
  
  
// inventories
Route::get('/inventories', [AdminController::class, 'view_inventory']);
Route::post('/store_inventory', [AdminController::class, 'store_inventory']) -> name('store_inventory');
Route::delete('/inventories/delete/{inventory}', [AdminController::class, 'destroy_inventory']) -> name('destroy_inventory');
Route::patch('/inventories/update/{inventory}', [AdminController::class, 'update_inventory']) -> name('update_inventory');
// inventories end
  
// Cart
Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders/fetch/products', [OrderController::class, 'fetchProducts']);
Route::post('/orders/fetch/inventories', [OrderController::class, 'fetchInventories']);
Route::post('/orders/store', [OrderController::class, 'store']);
