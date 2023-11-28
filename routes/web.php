<?php

use App\Http\Controllers\ProductController;
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
});


//Products
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('products/edit/{product}', [ProductController::class, 'edit']);

Route::put('/products/{product}', [ProductController::class, 'update']);

Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::get('/products/{product}', [ProductController::class, 'show']);
