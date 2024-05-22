<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAccountController;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

// Authentication Route
Route::get('/', [AuthController::class, 'login'])->middleware('guest');
Route::post('/', [AuthController::class, 'doLogin'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Admin Route - Role Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

// User Route - Role User
Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');

// Resources Route - Menu
Route::resource('/author', AuthorController::class)->middleware('auth');
Route::resource('/book', BookController::class)->middleware('auth');
Route::resource('/category', CategoryController::class)->middleware('auth');
Route::resource('/publisher', PublisherController::class)->middleware('auth');
Route::resource('/user', UserAccountController::class)->middleware('auth');
