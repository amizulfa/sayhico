<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Admin\Produk;
use App\Models\Admin\Kategori;
use App\Models\Admin\Testimoni;
use App\Models\Admin\Portfolio;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count(); 
    $totalKategori = Kategori::count(); 
    $totalTestimoni = Testimoni::count(); 
    $totalPortfolio = Portfolio::count(); 
    $totalWishlist = Wishlist::count(); 

    // Ambil produk yang paling banyak disimpan
    $produkFavorit = Wishlist::select('id_produk', DB::raw('COUNT(*) as total_disimpan'))
        ->groupBy('id_produk')
        ->orderByDesc('total_disimpan')
        ->with('produk') // Relasi ke produk
        ->first();


    return view('page.admin.dashboard', compact(
        'totalKategori', 
        'totalProduk', 
        'totalTestimoni', 
        'totalPortfolio',
        'totalWishlist',
        'produkFavorit'
    ));
    }
}
