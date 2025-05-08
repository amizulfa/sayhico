<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CaraOrderController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\KontakKamiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminKategoriController;
use App\Http\Controllers\admin\AdminProdukController;
use App\Http\Controllers\admin\AdminTestimoniController;
use App\Http\Controllers\admin\AdminPortfolioController;
use App\Http\Controllers\admin\AdminKategoriFaqController;
use App\Http\Controllers\admin\AdminFaqController;
use App\Http\Controllers\admin\AdminPesanController;

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
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
Route::get('/produk/{id_produk}', [ProductController::class, 'show'])->name('produk.detail');
Route::post('/kontak-kami', [KontakController::class, 'kirim'])->name('kontak.kirim');

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
    Route::post('/wishlist/remove', [WishlistController::class, 'destroy'])->name('wishlist.remove');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Kategori
    Route::get('/kategori', [AdminKategoriController::class, 'index'])->name('admin.kategori');
    Route::get('/kategori/tambah', [AdminKategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori/store', [AdminKategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/kategori/edit/{id}', [AdminKategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::post('/kategori/update/{id}', [AdminKategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/kategori/delete/{id}', [AdminKategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    // Produk
    Route::get('/produk', [AdminProdukController::class, 'index'])->name('admin.produk');
    Route::get('/produk/tambah', [AdminProdukController::class, 'create'])->name('admin.produk.create');
    Route::post('/produk/store', [AdminProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('/produk/edit/{id}', [AdminProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::post('/produk/update/{id}', [AdminProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/produk/{id}', [AdminProdukController::class, 'destroy'])->name('admin.produk.destroy');

    // Testimoni
    Route::get('/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni');
    Route::get('/testimoni/create', [AdminTestimoniController::class, 'create'])->name('admin.testimoni.create');
    Route::post('/testimoni', [AdminTestimoniController::class, 'store'])->name('admin.testimoni.store');
    Route::get('/testimoni/edit/{id}', [AdminTestimoniController::class, 'edit'])->name('admin.testimoni.edit');
    Route::post('/testimoni/update/{id}', [AdminTestimoniController::class, 'update'])->name('admin.testimoni.update');    
    Route::delete('/testimoni/{id}', [AdminTestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');

    // Portfolio
    Route::get('/portfolio', [AdminPortfolioController::class, 'index'])->name('admin.portfolio');
    Route::get('/portfolio/create', [AdminPortfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::post('/portfolio/store', [AdminPortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::get('/portfolio/edit/{id}', [AdminPortfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::post('/portfolio/update/{id}', [AdminPortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('/portfolio/delete/{id}', [AdminPortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');

    // Kategori FAQs
    Route::get('/kategorifaqs', [AdminKategoriFaqController::class, 'index'])->name('admin.kategorifaqs');
    Route::get('/kategorifaqs/tambah', [AdminKategoriFaqController::class, 'create'])->name('admin.kategorifaqs.create');
    Route::post('/kategorifaqs', [AdminKategoriFaqController::class, 'store'])->name('admin.kategorifaqs.store');
    Route::get('/kategorifaqs/{id}/edit', [AdminKategoriFaqController::class, 'edit'])->name('admin.kategorifaqs.edit');
    Route::put('/kategorifaqs/{id}', [AdminKategoriFaqController::class, 'update'])->name('admin.kategorifaqs.update');
    Route::delete('/kategorifaqs/{id}', [AdminKategoriFaqController::class, 'destroy'])->name('admin.kategorifaqs.destroy');

    // FAQs
    Route::get('/faqs', [AdminFaqController::class, 'index'])->name('admin.faqs');
    Route::get('/faqs/tambah', [AdminFaqController::class, 'create'])->name('admin.faqs.create');
    Route::post('/faqs', [AdminFaqController::class, 'store'])->name('admin.faqs.store');
    Route::get('/faqs/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin.faqs.edit');
    Route::post('/faqs/update/{id}', [AdminFaqController::class, 'update'])->name('admin.faqs.update');
    Route::delete('/faqs/delete/{id}', [AdminFaqController::class, 'destroy'])->name('admin.faqs.destroy');

    Route::get('/pesan', [AdminPesanController::class, 'index'])->name('admin.pesan');
    Route::post('/pesan/{id}/baca', [AdminPesanController::class, 'baca'])->name('pesan.baca');
    Route::get('/pesan/{id}/detail', [AdminPesanController::class, 'show'])->name('pesan.detail');
});

