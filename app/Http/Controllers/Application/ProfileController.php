<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; // <-- Tambahkan ini
use Illuminate\Validation\Rule; // <-- Tambahkan ini
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    //
    public function index(Request $request){
        return view('application.menu.edit_profile');
    }

    public function show(Request $request){
        $id = auth()->user()->id;
        $user = DB::connection('mysql')->select("SELECT name, password, full_name, profile, email FROM users WHERE id = ?", [$id]);
        $user = !empty($user) ? (array)$user[0] : null;

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Convert password to plain text (not recommended for production)
        $user['password'] = (string) $user['password'];

        return response()->json($user);
    }

     public function update(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // maks 2MB
        ]);

        $updateData = [
            'full_name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }

        if ($request->hasFile('profile')) {
            if ($user->profile && Storage::disk('public')->exists($user->profile)) {
            Storage::disk('public')->delete($user->profile);
            }
            $path = $request->file('profile')->store('profile', 'public');
            $updateData['profile'] = 'storage/' . $path;
        }

        DB::connection('mysql')->table('users')
            ->where('id', $user->id)
            ->update($updateData);

        return response()->json(['message' => 'Profile berhasil diupdate!']);
    }
}
