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


    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->level === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->level === 'warga') {
            return redirect()->route('home');
        }

        Auth::logout();
        return redirect('/login')->with('messages', 'Level user tidak dikenali.');
    }

    return back()->with('messages', 'Login gagal. Periksa kembali username dan password.');
}



    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect('/admin/login')->with('messages', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        if ($user->level === 'admin') {
            return view('admin.dashboard', compact('user'));
        } elseif ($user->level === 'warga') {
            return view('halaman', compact('user'));
        }

        return abort(403, 'Akses ditolak.');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }


    public function create()
    {
        return view('admin.create-users');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
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

        return redirect()->route('users')->with('success', 'User berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-users', compact('user'));
    }


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

        $user->update([
            'name'     => $request->name,
            'username' => $request->username,
            'nohp'     => $request->nohp,
            'address'  => $request->address,
            'level'    => $request->level,
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('users')->with('success', 'User berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User berhasil dihapus.');
    }
}
