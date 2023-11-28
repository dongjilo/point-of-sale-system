<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('dbAdd_category');
});
Route::get('add_category', function () {
    return view('dbAdd_category');
});
Route::get('add_supplier', function () {
    return view('dbAdd_supplier');
});
Route::get('add_usertype', function () {
    return view('dbAdd_usertype');
});


Route::post('save_category', [AdminController::class, 'save_category']);
Route::post('save_supplier', [AdminController::class, 'save_supplier']);
Route::post('save_usertype', [AdminController::class, 'save_usertype']);

