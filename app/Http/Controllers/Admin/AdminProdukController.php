<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Produk;
use App\Models\Admin\Kategori;
use Illuminate\Support\Facades\Storage;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); 
        return view('page.admin.produk', compact('produk'));
    }
    
    public function create()
    {
        $kategori = Kategori::all();
        return view('page.admin.produk_tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:356',
            'harga' => 'required|string|max:256',
            'deskripsi' => 'required',
            'ukuran' => 'required|string|max:10',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_produk2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_produk3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        
        $gambar1 = $request->file('gambar_produk')->store('produk', 'public');
        $gambar2 = $request->file('gambar_produk2') ? $request->file('gambar_produk2')->store('produk', 'public') : null;
        $gambar3 = $request->file('gambar_produk3') ? $request->file('gambar_produk3')->store('produk', 'public') : null;

        
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'ukuran' => $request->ukuran,
            'id_kategori' => $request->id_kategori,
            'gambar_produk' => $gambar1,
            'gambar_produk2' => $gambar2,
            'gambar_produk3' => $gambar3,
        ]);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('page.admin.produk_edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:356',
            'harga' => 'required|string|max:256',
            'deskripsi' => 'required',
            'ukuran' => 'required|string|max:10',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_produk2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_produk3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        
        if ($request->hasFile('gambar_produk')) {
            Storage::delete('public/' . $produk->gambar_produk);
            $produk->gambar_produk = $request->file('gambar_produk')->store('produk', 'public');
        }

        if ($request->hasFile('gambar_produk2')) {
            Storage::delete('public/' . $produk->gambar_produk2);
            $produk->gambar_produk2 = $request->file('gambar_produk2')->store('produk', 'public');
        }

        if ($request->hasFile('gambar_produk3')) {
            Storage::delete('public/' . $produk->gambar_produk3);
            $produk->gambar_produk3 = $request->file('gambar_produk3')->store('produk', 'public');
        }

       
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'ukuran' => $request->ukuran,
            'id_kategori' => $request->id_kategori,
        ]);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        
        if ($produk->gambar_produk) {
            Storage::disk('public')->delete($produk->gambar_produk);
        }
        if ($produk->gambar_produk2) {
            Storage::disk('public')->delete($produk->gambar_produk2);
        }
        if ($produk->gambar_produk3) {
            Storage::disk('public')->delete($produk->gambar_produk3);
        }

        
        $produk->delete();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus!');
    }

}
