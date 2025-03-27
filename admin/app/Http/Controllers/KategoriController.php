<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
   
    public function index()
    {
        $kategori = Kategori::all(); // Ambil semua kategori
        return view('kategori', compact('kategori')); 
    }

    
    public function create()
    {
        return view('kategori_tambah'); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

   
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori_edit', compact('kategori')); 
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori,' . $id . ',id_kategori',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
