<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Faq;
use App\Models\Admin\KategoriFaq;

class AdminFaqController extends Controller
{
    
    public function index()
    {
        $faqs = Faq::with('kategori')->get();
        return view('page.admin.faqs', compact('faqs'));
    }

    
    public function create()
    {
        $kategori = KategoriFaq::all();
        return view('page.admin.faqs_tambah', compact('kategori'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'id_kategorifaqs' => 'required|exists:kategori_faqs,id_kategorifaqs', 
        ]);

        Faq::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
            'id_kategorifaqs' => $request->id_kategorifaqs,
        ]);

        return redirect()->route('admin.faqs')->with('success', 'FAQ berhasil ditambahkan!');
    }

    
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $kategori = KategoriFaq::all();
        return view('page.admin.faqs_edit', compact('faq', 'kategori'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'id_kategorifaqs' => 'required|exists:kategori_faqs,id_kategorifaqs', 
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
            'id_kategorifaqs' => $request->id_kategorifaqs,
        ]);

        return redirect()->route('admin.faqs')->with('success', 'FAQ berhasil diperbarui!');
    }

        public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faqs')->with('success', 'FAQ berhasil dihapus!');
    }
}
