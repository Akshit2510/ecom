<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MainController;

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

Route::get('/', [MainController::class,'index'])->name('index');
Route::get('/cart', [MainController::class,'cart'])->name('cart');
Route::get('/shop', [MainController::class,'shop'])->name('shop');
Route::get('/single-product/{id}', [MainController::class,'singleProduct'])->name('single.product');
Route::get('/checkout', [MainController::class,'checkout'])->name('checkout');
Route::get('/register', [MainController::class,'register'])->name('register');
Route::post('/register-user', [MainController::class,'registerUser'])->name('register.user');
Route::get('/login', [MainController::class,'login'])->name('login');
Route::post('/login-user', [MainController::class,'loginUser'])->name('login.user');
Route::get('/logout', [MainController::class,'logout'])->name('logout');