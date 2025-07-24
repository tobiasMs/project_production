<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    //
     public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_scan' => ['required', 'string', 'max:100', 'unique:users,no_scan'],
            'dept' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', 'min:3'],
            'profile' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Simpan foto jika ada
        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profile', 'public');
        }

        // Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'no_scan' => $validated['no_scan'],
            'dept' => $validated['dept'],
            'jabatan' => $validated['jabatan'],
            'password' => Hash::make($validated['password']),
            'profile' => 'storage/'.$profilePath,
            'status_active' => '1', // default status
        ]);

        // Tambahkan role jika perlu
        // $user->assignRole('user');

        event(new Registered($user));

        // Login langsung setelah register
        auth()->login($user);

        return redirect()->intended('/dashboard');
    }

}
