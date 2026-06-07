<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $userId = $user->id;

        $totalProyek = \App\Models\Proyek::where('user_id', $userId)->count();
        $statusPerencanaan = \App\Models\Proyek::where('user_id', $userId)->where('status_proyek', 'Perencanaan')->count();
        $statusProsesRevisi = \App\Models\Proyek::where('user_id', $userId)->whereIn('status_proyek', ['Proses', 'Revisi'])->count();
        $statusSelesai = \App\Models\Proyek::where('user_id', $userId)->where('status_proyek', 'Selesai')->count();

        $proyekTerbaru = \App\Models\Proyek::where('user_id', $userId)->latest()->take(5)->get();

        return view('dashboard', compact('user', 'totalProyek', 'statusPerencanaan', 'statusProsesRevisi', 'statusSelesai', 'proyekTerbaru'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}