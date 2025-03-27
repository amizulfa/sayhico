<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriFaq;

class KategoriFaqController extends Controller
{
    
    public function index()
    {
        $kategori = KategoriFaq::all();
        return view('kategorifaqs', compact('kategori'));
    }

    
    public function create()
    {
        return view('kategorifaqs_tambah');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:256',
        ]);

        KategoriFaq::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategorifaqs')->with('success', 'Kategori FAQ berhasil ditambahkan!');
    }

    
    public function edit($id)
    {
        $kategori = KategoriFaq::findOrFail($id);
        return view('kategorifaqs_edit', compact('kategori'));
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

        return redirect()->route('kategorifaqs')->with('success', 'Kategori FAQ berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        $kategori = KategoriFaq::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategorifaqs')->with('success', 'Kategori FAQ berhasil dihapus!');
    }
}
