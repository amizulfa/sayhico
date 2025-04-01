<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Produk;
use App\Models\Admin\Kategori;
use App\Models\Admin\Testimoni;
use App\Models\Admin\Portfolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count(); 
        $totalKategori = Kategori::count(); 
        $totalTestimoni = Testimoni::count(); 
        $totalPortfolio = Portfolio::count(); 

        return view('page.admin.dashboard', compact('totalKategori', 'totalProduk', 'totalTestimoni', 'totalPortfolio'));
    }
}
