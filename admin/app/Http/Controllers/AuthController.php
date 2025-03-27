<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $adminUsername = 'admin';
        $adminPassword = '123456';

        if ($request->username === $adminUsername && $request->password === $adminPassword) {
            Session::put('admin', true);
            Session::save(); // Simpan session

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['username' => 'Username atau password salah!']);
    }

    // Logout
    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
