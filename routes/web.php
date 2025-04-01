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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WishlistController;

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
})->name('beranda');


Route::get('/kategoriproduk', [KategoriController::class, 'index'])->name('kategoriproduk.index');
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/caraorder', [CaraOrderController::class, 'index'])->name('caraorder.index');
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/kontakkami', [KontakKamiController::class, 'index'])->name('kontakkami.index');
Route::get('/tentangkami', [TentangKamiController::class, 'index'])->name('tentangkami.index');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs.index');
Route::get('/produk/{id_produk}', [ProductController::class, 'show'])->name('produk.detail');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    // Route untuk melihat wishlist
    Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist.index');

});