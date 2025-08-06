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
    /**
     * Tampilkan semua user.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Form tambah user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Simpan user baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'nohp'     => 'nullable|string|max:20',
            'address'  => 'nullable|string',
            'level'    => 'required|in:warga,admin',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nohp'     => $request->nohp,
            'address'  => $request->address,
            'level'    => $request->level,
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Form edit user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Simpan perubahan user.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'nohp'     => 'nullable|string|max:20',
            'address'  => 'nullable|string',
            'level'    => 'required|in:warga,admin',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->nohp     = $request->nohp;
        $user->address  = $request->address;
        $user->level    = $request->level;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus user.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
    }
}
