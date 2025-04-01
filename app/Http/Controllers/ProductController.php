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

    public function show($id_produk)
    {
        $produk = Produk::where('id_produk', $id_produk)->firstOrFail();

        // Ambil produk lain dengan kategori yang sama, kecuali produk yang sedang dilihat
        $produkLainnya = Produk::where('id_kategori', $produk->id_kategori)
                                ->where('id_produk', '!=', $id_produk)
                                ->limit(4)
                                ->get();

        return view('page.detailproduk', compact('produk', 'produkLainnya'));
    }




}

