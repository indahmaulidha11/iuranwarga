<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Officer;
use App\Models\DuesCategory;
use App\Models\Payment;
use App\Models\DuesMember;

class AdminController extends Controller
{
    public function index()
    {
        $totalWarga = User::count();
        $totalPetugas = Officer::count();
        $totalKategori = DuesCategory::count();
        $totalPembayaran = Payment::count();
        $totalAnggotaIuran = DuesMember::count(); 

        return view('admin.dashboard', compact(
            'totalWarga', 'totalPetugas', 'totalKategori', 'totalPembayaran', 'totalAnggotaIuran'
        ));
    }
}
