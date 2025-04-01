<?php
namespace App\Http\Controllers\Admin;

use App\Models\Admin\Kategori;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
   
    public function index()
    {
        $kategori = Kategori::all(); // Ambil semua kategori
        return view('page.admin.kategori', compact('kategori')); 
    }

    
    public function create()
    {
        return view('page.admin.kategori_tambah'); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

   
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('page.admin.kategori_edit', compact('kategori')); 
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

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
