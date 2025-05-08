<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class KontakController extends Controller
{
    public function kirim(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);
    
        // Membuat entri baru tanpa harus menyertakan created_at
        Pesan::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
    
        return back()->with('success', 'Pesan berhasil dikirim!');
    }
    
}
