<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
use Illuminate\Http\Request;

class DuesCategoryController extends Controller
{
 

    public function index()
    {
        $dues_categories = DuesCategory::all();
        return view('admin.categories-index', compact('dues_categories'));
    }


    public function create()
    {
        return view('admin.create-category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        DuesCategory::create($request->all());
        return redirect()->route('dues.categori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        DuesCategory::destroy($id);
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
