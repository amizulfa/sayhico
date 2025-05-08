<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Produk;

class WishlistController extends Controller
{
    // Menampilkan produk yang ada di wishlist dengan filter
    public function show(Request $request)
    {
        $user = auth()->user();

        $query = Wishlist::with('produk.kategori')
                    ->where('id_user', $user->id_user);

        // Filter/sorting berdasarkan request
        if ($request->sort === 'harga_terendah') {
            $query->join('produk', 'wishlist.id_produk', '=', 'produk.id_produk')
                  ->orderBy('produk.harga', 'asc')
                  ->select('wishlist.*'); // Supaya tetap ambil kolom wishlist
        } elseif ($request->sort === 'harga_tertinggi') {
            $query->join('produk', 'wishlist.id_produk', '=', 'produk.id_produk')
                  ->orderBy('produk.harga', 'desc')
                  ->select('wishlist.*');
        } elseif ($request->sort === 'terbaru') {
            $query->orderBy('tanggal_simpan', 'desc');
        } elseif ($request->sort === 'terlama') {
            $query->orderBy('tanggal_simpan', 'asc');
        }

        $wishlistItems = $query->get();

        return view('page.wishlist', compact('wishlistItems'));
    }

    // Menyimpan produk ke wishlist
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk'
        ]);

        $user = auth()->user();

        $existingWishlistItem = Wishlist::where('id_user', $user->id_user)
                                        ->where('id_produk', $request->id_produk)
                                        ->first();

        if ($existingWishlistItem) {
            return response()->json([
                'message' => 'Produk sudah ada di wishlist.'
            ]);
        }

        Wishlist::create([
            'id_user' => $user->id_user,
            'id_produk' => $request->id_produk,
            'tanggal_simpan' => now()->toDateString(), // isi tanggal simpan otomatis
        ]);

        return response()->json([
            'message' => 'Produk berhasil disimpan ke wishlist.'
        ]);
    }

    // Menghapus produk dari wishlist
    public function destroy(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk'
        ]);

        $user = auth()->user();

        Wishlist::where('id_user', $user->id_user)
                ->where('id_produk', $request->id_produk)
                ->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus dari wishlist.'
        ]);
    }
}
