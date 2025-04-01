<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\KategoriFaq;

class AdminKategoriFaqController extends Controller
{
    
    public function index()
    {
        $kategori = KategoriFaq::all();
        return view('page.admin.kategorifaqs', compact('kategori'));
    }

    
    public function create()
    {
        return view('page.admin.kategorifaqs_tambah');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:256',
        ]);

        KategoriFaq::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('admin.kategorifaqs')->with('success', 'Kategori FAQ berhasil ditambahkan!');
    }

    
    public function edit($id)
    {
        $kategori = KategoriFaq::findOrFail($id);
        return view('page.admin.kategorifaqs_edit', compact('kategori'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:256',
        ]);

        $kategori = KategoriFaq::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('admin.kategorifaqs')->with('success', 'Kategori FAQ berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        $kategori = KategoriFaq::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategorifaqs')->with('success', 'Kategori FAQ berhasil dihapus!');
    }
}
