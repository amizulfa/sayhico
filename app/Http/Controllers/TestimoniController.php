<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni; // Import model Testimoni
use App\Models\Kategori;  // Import model Kategori

class TestimoniController extends Controller
{
    public function index(Request $request)
{
    $query = Testimoni::query()->with('kategoriData');

    // Filter berdasarkan kategori
    if ($request->has('kategori') && $request->kategori != 'semua') {
        $query->whereHas('kategoriData', function ($q) use ($request) {
            $q->where('nama_kategori', $request->kategori);
        });
    }

    // Filter berdasarkan ada/tidaknya foto
    if ($request->has('foto') && $request->foto == 'dengan_foto') {
        $query->whereNotNull('gambar_testi')->where('gambar_testi', '!=', '');
    }

    // Filter berdasarkan rating
if ($request->has('rating') && $request->rating != "") {
        $query->where('rating', '=', (int) $request->rating);  // Pastikan hanya rating yang dipilih yang diambil
    }


    $testimoni = $query->orderBy('waktu_pembelian', 'desc')->get();
    $kategori = Kategori::all();

    if ($request->ajax()) {
        return response()->json(['testimoni' => $testimoni]);
    }

    return view('page.testimoni', compact('testimoni', 'kategori'));
}


}
