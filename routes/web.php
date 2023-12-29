<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/admin/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/admin/approve/{id?}', [UserController::class, 'approve'])->middleware('auth');

Route::get('/admin/product', [ProductController::class, 'index'])->middleware('auth');
Route::get('/admin/product/add', [ProductController::class, 'add'])->middleware('auth');
Route::post('/admin/product/add', [ProductController::class, 'store'])->middleware('auth');
Route::get('/admin/product/edit/{id?}', [ProductController::class, 'edit'])->middleware('auth');
Route::post('/admin/product/edit/{id?}', [ProductController::class, 'update'])->middleware('auth');
Route::get('/admin/product/drop/{id?}', [ProductController::class, 'drop'])->middleware('auth');
