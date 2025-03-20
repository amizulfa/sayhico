<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CaraOrderController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\KontakKamiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\FaqsController;

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
    return view('welcome');
});

Route::get('/kategoriproduk', [KategoriController::class, 'index'])->name('kategoriproduk.index');
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/caraorder', [CaraOrderController::class, 'index'])->name('caraorder.index');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/kontakkami', [KontakKamiController::class, 'index'])->name('kontakkami.index');
Route::get('/tentangkami', [TentangKamiController::class, 'index'])->name('tentangkami.index');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs.index');
