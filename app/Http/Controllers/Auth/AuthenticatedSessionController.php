<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    //
     public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')
                ->with('success', 'Login Berhasil! Selamat datang, ' . Auth::user()->name . '.');
        }

        return back()->with('error', 'Username atau Password yang Anda masukkan salah.')
                     ->withInput($request->only('name'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
