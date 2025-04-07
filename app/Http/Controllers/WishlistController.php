<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist; // Model Wishlist
use App\Models\Produk;   // Model Produk

class WishlistController extends Controller
{
    // Menampilkan produk yang ada di wishlist
    public function show()
    {
        // Ambil user yang sedang login
        $user = auth()->user(); 

        // Ambil semua produk yang ada di wishlist berdasarkan user yang login
        $wishlistItems = $user->wishlist()->with('produk')->get(); // Menambahkan relasi produk

        // Kirimkan ke view untuk ditampilkan
        return view('page.wishlist', compact('wishlistItems'));
    }

    // Menyimpan produk ke wishlist
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk' // Pastikan id_produk ada di tabel produk
        ]);

        // Ambil user yang sedang login
        $user = auth()->user();

        // Cek apakah produk sudah ada di wishlist
        $existingWishlistItem = Wishlist::where('id_user', $user->id_user)
                                        ->where('id_produk', $request->id_produk)
                                        ->first();

        // Jika produk sudah ada di wishlist, jangan disimpan lagi
        if ($existingWishlistItem) {
            return response()->json([
                'message' => 'Produk sudah ada di wishlist.'
            ]);
        }

        // Simpan produk ke wishlist
        $wishlist = Wishlist::create([
            'id_user' => $user->id_user,
            'id_produk' => $request->id_produk
        ]);

        // Kirimkan respon sukses
        return response()->json([
            'message' => 'Produk berhasil disimpan ke wishlist.'
        ]);
    }

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
