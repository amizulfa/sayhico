<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni; // Import model Testimoni
use App\Models\Kategori;  // Import model Kategori

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil 5 testimoni terbaru
        $testimoni = Testimoni::with('kategoriData')->orderBy('waktu_pembelian', 'desc')->take(5)->get();
        
        return view('page.landingpage', compact('testimoni')); // Kirim ke view landingpage.blade.php
    }
}
