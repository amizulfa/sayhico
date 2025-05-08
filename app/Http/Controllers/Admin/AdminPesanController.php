<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;

class AdminPesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->paginate(10);
        return view('page.admin.pesan', compact('pesans'));
    }

    public function baca($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->is_read = true;
        $pesan->save();
    
        return redirect()->back()->with('success', 'Pesan telah ditandai sebagai sudah dibaca.');
    }
    
    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);
        return view('page.admin.pesan_detail', compact('pesan'));
    }


}

