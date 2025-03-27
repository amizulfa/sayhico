<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\KategoriFaqController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login'); 
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
    Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('testimoni.create');
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
    Route::get('/testimoni/edit/{id}', [TestimoniController::class, 'edit'])->name('testimoni.edit');
    Route::post('/testimoni/update/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');    
    Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');

    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
    Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::post('/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/delete/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    
    Route::get('/kategorifaqs', [KategoriFaqController::class, 'index'])->name('kategorifaqs');
    Route::get('/kategorifaqs/tambah', [KategoriFaqController::class, 'create'])->name('kategorifaqs.create');
    Route::post('/kategorifaqs', [KategoriFaqController::class, 'store'])->name('kategorifaqs.store');
    Route::get('/kategorifaqs/{id}/edit', [KategoriFaqController::class, 'edit'])->name('kategorifaqs.edit');
    Route::put('/kategorifaqs/{id}', [KategoriFaqController::class, 'update'])->name('kategorifaqs.update');
    Route::delete('/kategorifaqs/{id}', [KategoriFaqController::class, 'destroy'])->name('kategorifaqs.destroy');

    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');
    Route::get('/faqs/tambah', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/edit/{id}', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::post('/faqs/update/{id}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/delete/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');
});
