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
            // 'name' => 'required|string|max:255',
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

         DuesCategory::create([
        'period' => $request->period,
        'nominal' => $request->nominal,
        'status' => $request->status,
          ]);
        return redirect()->route('dues.categori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        DuesCategory::destroy($id);
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
    public function edit($id)
{
    $category = DuesCategory::findOrFail($id);
    return view('admin.edit-duesC', compact('category'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'description' => 'nullable|string',
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $category = DuesCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('dues.categori')->with('success', 'Kategori berhasil diperbarui.');
    }


    


}
