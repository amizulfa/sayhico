<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Testimoni;
use Illuminate\Http\Request;
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
        return view('page.admin.testimoni_tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,avi|max:51200', // max 50MB
            'platform' => 'required|in:Whatsapp,Instagram',
        ]);

        $mediaPath = $request->file('media')->store('testimoni', 'public');

        Testimoni::create([
            'media' => $mediaPath,
            'platform' => $request->platform,
        ]);

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('page.admin.testimoni_edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $request->validate([
            'media' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov,avi|max:51200',
            'platform' => 'required|in:Whatsapp,Instagram',
        ]);

        if ($request->hasFile('media')) {
            if ($testimoni->media) {
                Storage::disk('public')->delete($testimoni->media);
            }
            $mediaPath = $request->file('media')->store('testimoni', 'public');
        } else {
            $mediaPath = $testimoni->media;
        }

        $testimoni->update([
            'media' => $mediaPath,
            'platform' => $request->platform,
        ]);

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->media) {
            Storage::disk('public')->delete($testimoni->media);
        }

        $testimoni->delete();

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil dihapus!');
    }
}
