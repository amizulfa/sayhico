<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Testimoni;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count(); 
        $totalKategori = Kategori::count(); 
        $totalTestimoni = Testimoni::count(); 
        $totalPortfolio = Portfolio::count(); 

        return view('dashboard', compact('totalKategori', 'totalProduk', 'totalTestimoni', 'totalPortfolio'));
    }
}
