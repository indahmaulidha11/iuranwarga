<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
use Illuminate\Http\Request;

class DuesCategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = DuesCategory::all();
        return view('admin.dues.categories.index', $data);
    }

    public function create()
    {
        return view('admin.dues.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        DuesCategory::create($request->all());
        return redirect()->route('admin.dues.categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        DuesCategory::destroy($id);
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
