<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Portfolio;
use Illuminate\Support\Facades\Storage;

class AdminPortfolioController extends Controller
{
    
    public function index()
    {
        $portfolio = Portfolio::all();
        return view('page.admin.portfolio', compact('portfolio'));
    }

    
    public function create()
    {
        return view('page.admin.portfolio_tambah');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'gambar_port' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->file('gambar_port')->store('portfolio', 'public');

        Portfolio::create([
            'gambar_port' => $gambar,
        ]);

        return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil ditambahkan!');
    }

    
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('page.admin.portfolio_edit', compact('portfolio'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar_port' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $portfolio = Portfolio::findOrFail($id);

        if ($request->hasFile('gambar_port')) {
            Storage::delete('public/' . $portfolio->gambar_port);
            $gambar = $request->file('gambar_port')->store('portfolio', 'public');
            $portfolio->gambar_port = $gambar;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil diperbarui!');
    }

    
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        Storage::delete('public/' . $portfolio->gambar_port);
        $portfolio->delete();

        return redirect()->route('admin.portfolio')->with('success', 'Portfolio berhasil dihapus!');
    }
}

