<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class AdminWishlistController extends Controller
{
    public function index(Request $request)
    {
        $query = Wishlist::with(['user', 'produk']);

        // Filter tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal_simpan', [$request->start_date, $request->end_date]);
        }

        $wishlistItems = $query->latest('tanggal_simpan')->get();

        return view('page.admin.wishlist', compact('wishlistItems'));
    }
}
