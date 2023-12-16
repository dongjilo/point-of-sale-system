<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
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

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);



Route::post('/users', [UserController::class, 'store_users']);

Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {

        return view('dashboard');
    });

    // Users
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/register', [UserController::class, 'create']);

    Route::post('/users', [UserController::class, 'store']);

    Route::get('/users/edit/{user}', [UserController::class, 'edit']);

    Route::put('/users/{user}', [UserController::class, 'update']);

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

// orders
Route::get('/orders', [AdminController::class, 'view_order']);
Route::post('/store_order', [AdminController::class, 'store_order']) -> name('store_order');
Route::delete('/order/delete/{order}', [AdminController::class, 'destroy_order']) -> name('destroy_order');
Route::patch('/order/update/{order}', [AdminController::class, 'update_order']) -> name('update_order');
// orders end

    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/fetch/products', [CartController::class, 'fetchProducts']);
    Route::post('/cart/fetch/inventories', [CartController::class, 'fetchInventories']);
    Route::post('/orders/store', [CartController::class, 'store']);
});
