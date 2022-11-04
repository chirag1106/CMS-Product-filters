<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExcelController;
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

Route::get('/', [ProductController::class, 'index'])->name('main');


Route::get('/admin', [AdminController::class, 'main'])->name('admin');
Route::post('/login', [AdminController::class, 'login'])->name('AdminLogin');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashbaord');

Route::post('/upload', [ExcelController::class, 'upload'])->name('upload');

Route::get('/products', [ProductController::class, 'showProducts'])->name('products');

Route::post('/getAllProducts', [ProductController::class, 'getAllProducts']);
Route::post('/showDetails/{prod_sku}', [ProductController::class, 'showDetails']);
Route::get('/product/{prod_sku}', [ProductController::class, 'showParticularProduct']);

Route::post('/getSubCategory', [ProductController::class, 'getSubCategory']);
Route::post('/getCategory', [ProductController::class, 'getCategory']);
Route::post('/getAvailableOptions', [ProductController::class, 'getAvailableOptions']);

Route::post('/getPaginate', [ProductController::class, 'getPaginate']);
