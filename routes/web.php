<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::post('/login', [AuthController::class, 'Login'])->name('login'); 
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Product
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product-store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product-edit');;
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product-update');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');