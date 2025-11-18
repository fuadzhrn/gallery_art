<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|in:seniman,admin',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Validasi user dan password
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        // Validasi role user
        if ($user->role !== $credentials['role']) {
            return back()->withErrors([
                'role' => 'Role tidak sesuai dengan akun Anda.',
            ])->onlyInput('email');
        }

        // Login user
        Auth::login($user);

        // Redirect berdasarkan role
        if ($user->role === 'seniman') {
            return redirect('/dashboard-seniman')->with('success', 'Selamat datang, Seniman!');
        } else if ($user->role === 'admin') {
            return redirect('/dashboard-admin')->with('success', 'Selamat datang, Admin!');
        }

        return redirect('/');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
