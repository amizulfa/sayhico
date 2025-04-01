<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegisterForm()
{
    return view('page.register');
}

public function register(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:256',
        'email' => 'required|email|unique:user,email',
        'password' => 'required|min:6'
    ]);

    User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
}
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('page.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Jika email atau username adalah "admin" dan password adalah "admin"
        if (($request->email === 'admin' || $request->email === 'admin@admin.com') && $request->password === 'admin') {
            // Simpan sesi admin secara manual
            session(['is_admin' => true]);

            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin!');
        }

        // Proses login biasa
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('beranda')->with('success', 'Berhasil login!');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }


    // Logout user
    public function logout()
{
    session()->forget('is_admin'); // Hapus sesi admin jika ada
    Auth::logout(); // Logout user

    // Redirect ke halaman login
    return redirect()->route('login')->with('success', 'Anda telah logout!');
}

    

    
}
