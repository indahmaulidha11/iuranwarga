<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    // LOGIN ADMIN
    public function login(Request $request)
    {
        $validation = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validation)) {
            // cek apakah user admin
            if (Auth::user()->level === 'admin') {
                return redirect()->intended('admin');
            }
            // jika bukan admin diarahkan ke dashboard warga
            return redirect()->intended('/');
        }

        return redirect()->back()->with('messages', 'Login unsuccessful');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    // LOGIN WARGA
    public function warga()
    {
        return view('halaman');
    }

    public function authwarga(Request $request)
    {
        $validation = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validation)) {
            // cek apakah user warga
            if (Auth::user()->level === 'warga') {
                return redirect()->intended('/');
            }
            // jika bukan warga diarahkan ke admin
            return redirect()->intended('admin');
        }

        return redirect()->back()->with('messages', 'Login unsuccessful');
    }

    public function logoutwarga()
    {
        Auth::logout();
        return redirect('/');
    }

    // REGISTER
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'nohp' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'level' => 'required|in:warga,admin',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nohp' => $request->nohp,
            'address' => $request->address,
            'level' => $request->level,
        ]);

        Auth::login($user);

        // redirect sesuai level
        if ($user->level === 'admin') {
            return redirect()->intended('admin');
        }
        return redirect()->intended('/');
    }
}
