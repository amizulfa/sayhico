<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Testimoni;
use App\Models\Admin\Kategori;
use Illuminate\Support\Facades\Storage;

class AdminTestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('page.admin.testimoni', compact('testimoni'));
    }

    public function create()
    {
        $kategori = Kategori::all(); 
        return view('page.admin.testimoni_tambah', compact('kategori'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_pembeli' => 'required|string|max:256',
        'waktu_pembelian' => 'required|date',
        'variasi' => 'required|string|max:256',
        'kategori' => 'required|exists:kategori,id_kategori', 
        'deskripsi' => 'required',
        'rating' => 'required|integer|min:1|max:5',
        'gambar_testi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    
    $gambar = $request->file('gambar_testi') ? $request->file('gambar_testi')->store('testimoni', 'public') : null;

    Testimoni::create([
        'nama_pembeli' => $request->nama_pembeli,
        'waktu_pembelian' => $request->waktu_pembelian,
        'variasi' => $request->variasi,
        'id_kategori' => $request->kategori, 
        'deskripsi' => $request->deskripsi,
        'rating' => $request->rating,
        'gambar_testi' => $gambar,
    ]);

    return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil ditambahkan!');
}

public function edit($id)
{
    $testimoni = Testimoni::findOrFail($id); 
    $kategori = Kategori::all(); 

    return view('page.admin.testimoni_edit', compact('testimoni', 'kategori'));
}


public function update(Request $request, $id)
{
    $testimoni = Testimoni::findOrFail($id);

    $request->validate([
        'nama_pembeli' => 'required|string|max:256',
        'waktu_pembelian' => 'required|date',
        'variasi' => 'required|string|max:256',
        'id_kategori' => 'required|exists:kategori,id_kategori',
        'deskripsi' => 'required',
        'rating' => 'required|integer|min:1|max:5',
        'gambar_testi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    
    if ($request->hasFile('gambar_testi')) {
        if ($testimoni->gambar_testi) {
            Storage::delete('public/' . $testimoni->gambar_testi);
        }
        $gambar = $request->file('gambar_testi')->store('testimoni', 'public');
    } else {
        $gambar = $testimoni->gambar_testi;
    }

   
    $testimoni->update([
        'nama_pembeli' => $request->nama_pembeli,
        'waktu_pembelian' => $request->waktu_pembelian,
        'variasi' => $request->variasi,
        'id_kategori' => $request->id_kategori,
        'deskripsi' => $request->deskripsi,
        'rating' => $request->rating,
        'gambar_testi' => $gambar,
    ]);

    return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil diperbarui!');
}



    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->gambar_testi) {
            Storage::disk('public')->delete($testimoni->gambar_testi);
        }

        $testimoni->delete();

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil dihapus!');
    }
}
