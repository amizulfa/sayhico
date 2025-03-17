<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $kategori = $request->query('kategori');

    if ($kategori) {
        $produk = Produk::whereHas('kategori', function ($query) use ($kategori) {
            $query->where('nama_kategori', $kategori);
        })->get();
    } else {
        $produk = Produk::all();
    }

    return view('page.produk', compact('produk', 'kategori'));
}


}

