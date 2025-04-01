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
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('beranda')->with('success', 'Berhasil login!');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout!');
    }

    
}
