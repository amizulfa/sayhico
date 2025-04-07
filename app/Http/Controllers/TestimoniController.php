<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Kategori;

class TestimoniController extends Controller
{
    public function index(Request $request)
{
    $query = Testimoni::with('kategori');

    if ($request->has('kategori') && $request->kategori) {
        $query->whereHas('kategori', function ($q) use ($request) {
            $q->where('nama_kategori', $request->kategori);
        });
    }

    if ($request->has('rating') && $request->rating) {
        $query->where('rating', $request->rating);
    }

    if ($request->has('foto') && $request->foto === 'dengan_foto') {
        $query->whereNotNull('gambar_testi')->where('gambar_testi', '!=', '');
    }

    $testimoni = $query->get();
    $kategori = \App\Models\Kategori::all();

    if ($request->ajax()) {
        return response()->json([
            'testimoni' => $testimoni
        ]);
    }

    return view('page.testimoni', compact('testimoni', 'kategori'));
}

}
