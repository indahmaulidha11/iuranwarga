<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Officer;
use App\Models\DuesCategory;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalUsers' => User::count(),
            'totalOfficers' => Officer::count(),
            'totalCategories' => DuesCategory::count(),
            'totalPayments' => Payment::sum('amount') // atau count(), sesuaikan
        ]);
    }
}
