<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Wishlist;

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

        $produkLainnya = Produk::where('id_kategori', $produk->id_kategori)
                                ->where('id_produk', '!=', $id_produk)
                                ->limit(4)
                                ->get();

                                $sudahDisimpan = false;

        if (auth()->check()) {
            $sudahDisimpan = Wishlist::where('id_user', auth()->user()->id_user)
                                    ->where('id_produk', $id_produk)
                                    ->exists();
        }

        return view('page.detailproduk', compact('produk', 'produkLainnya', 'sudahDisimpan'));
    }




}

