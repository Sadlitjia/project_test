<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->pengguna->role == 'admin') {
                // Redirect ke halaman admin
                return redirect()->route('admin.index');
            } elseif ($user->pengguna->role == 'pengguna') {
                // Redirect ke halaman pengguna
                return redirect()->route('user.index');
            }
        }

        // Jika autentikasi gagal, kembali ke halaman login
        return redirect()->route('login.form')->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.form');
    }
}
