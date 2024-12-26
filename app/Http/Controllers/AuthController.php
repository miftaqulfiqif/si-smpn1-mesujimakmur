<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm() {
        if (Auth::check()) {
            $user = Auth::user();
            
            if (is_null($user->nisn)) {
                return redirect('/admin');
            }
            return redirect('/ppdb/pendaftaran');
        }
        return view('auth.login');
    }

    public function register(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|unique:users,nisn',
            'password' => 'required|min:8|confirmed',
        ]);

        Log::info('Validation passed');

        User::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('ppdb.login')->with('success', 'Registrasi berhasil!');
    }   

    public function login(Request $request)
    {
        
        $request->validate([
            'nisn' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('nisn', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended('/ppdb/pendaftaran')->with('success', 'Login berhasil!');
        }
        

        return back()->withErrors([
            'nisn' => 'NISN atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/ppdb/login')->with('success', 'Anda telah logout.');
    }
}
