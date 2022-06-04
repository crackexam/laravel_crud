<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('company/delete/{id}', [App\Http\Controllers\CompanyController::class, 'delete'])->name('delete');
Route::get('client/delete/{id}', [App\Http\Controllers\ClientController::class, 'delete'])->name('delete');
Route::get('product/delete/{id}', [App\Http\Controllers\ProductsController::class, 'delete'])->name('delete');
Route::post('client/checkemail', [App\Http\Controllers\ClientController::class, 'checkemail'])->name('checkmail');
Route::resource('company', App\Http\Controllers\CompanyController::class);
Route::resource('client', App\Http\Controllers\ClientController::class);
Route::post('search', [App\Http\Controllers\ClientController::class, 'search']);
Route::resource('product', App\Http\Controllers\ProductsController::class);
