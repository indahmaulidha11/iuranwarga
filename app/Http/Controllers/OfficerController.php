<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::all();
        return view('admin.officers', compact('officers'));
    }

    public function create()
    {
        return view('admin.create-officers');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'nullable',
        ]);

        Officer::create($request->only('name', 'position'));

        return redirect()->route('officers')->with('success', 'Officer berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $officer = Officer::findOrFail($id);
        return view('admin.edit-officers', compact('officer'));
    }

    public function update(Request $request, $id)
    {
        $officer = Officer::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'position' => 'nullable'
        ]);

        $officer->update($request->only('name', 'position'));

        return redirect()->route('officers')->with('success', 'Officer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $officer = Officer::findOrFail($id);
        $officer->delete();

        return redirect()->route('officers')->with('success', 'Officer berhasil dihapus.');
    }
}
