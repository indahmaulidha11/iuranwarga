<?php

namespace App\Http\Controllers;

use App\Models\DuesMember;
use App\Models\User;
use App\Models\DuesCategory;
use Illuminate\Http\Request;

class DuesMemberController extends Controller
{
    public function index()
    {
        $members = DuesMember::with(['user', 'category'])->get();
        return view('admin.duesMember', compact('members'));
    }

    public function create()
    {
        $users = User::all();
        $categories = DuesCategory::all();
        return view('admin.create-duesM', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:users,id',
            'idduescategory' => 'required|exists:dues_categories,id',
        ]);

        DuesMember::create($request->all());
        return redirect()->route('dues.members')->with('success', 'Anggota iuran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $member = DuesMember::findOrFail($id);
        $users = User::all();
        $categories = DuesCategory::all();
        return view('admin.edit-duesM', compact('member', 'users', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $member = DuesMember::findOrFail($id);

        $request->validate([
            'iduser' => 'required|exists:users,id',
            'idduescategory' => 'required|exists:dues_categories,id',
        ]);

        $member->update($request->all());
        return redirect()->route('dues.members')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $member = DuesMember::findOrFail($id);
        $member->delete();

        return redirect()->route('dues.members')->with('success', 'Data berhasil dihapus.');
    }
}
