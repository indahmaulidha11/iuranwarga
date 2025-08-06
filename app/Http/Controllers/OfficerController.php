<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OfficersController extends Controller
{
    public function index()
    {
        $officers = User::where('level', 'admin')->get();
        return view('officers.index', compact('officers'));
    }

    public function create()
    {
        return view('officers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'nohp'     => 'nullable',
            'address'  => 'nullable',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nohp'     => $request->nohp,
            'address'  => $request->address,
            'level'    => 'admin',
        ]);

        return redirect()->route('admin.officers')->with('success', 'Officer berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $officer = User::findOrFail($id);
        return view('officers.edit', compact('officer'));
    }

    public function update(Request $request, $id)
    {
        $officer = User::findOrFail($id);

        $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'nohp'     => 'nullable',
            'address'  => 'nullable',
        ]);

        $officer->update([
            'name'     => $request->name,
            'username' => $request->username,
            'nohp'     => $request->nohp,
            'address'  => $request->address,
        ]);

        if ($request->filled('password')) {
            $officer->password = Hash::make($request->password);
            $officer->save();
        }

        return redirect()->route('admin.officers')->with('success', 'Officer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $officer = User::findOrFail($id);
        $officer->delete();

        return redirect()->route('admin.officers')->with('success', 'Officer berhasil dihapus.');
    }
}
