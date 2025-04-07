<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
        public function index()
    {
        $user = Auth::user();
        return view('page.profil', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('page.editProfil', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:user,email,' . Auth::user()->id_user . ',id_user',
        ]);

        $user = Auth::user();
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

}
