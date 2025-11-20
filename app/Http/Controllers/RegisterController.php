<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Tampilkan halaman register
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Proses pendaftaran user baru
     */
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required|accepted',
        ], [
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok.',
            'terms.required' => 'Anda harus menerima syarat dan ketentuan.',
            'name.required' => 'Nama harus diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);

        // Buat user baru dengan role otomatis 'seniman'
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'seniman', // Selalu otomatis jadi seniman
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login dengan email dan password Anda.');
    }
}
