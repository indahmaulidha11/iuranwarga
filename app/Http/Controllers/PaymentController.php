<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
    public function confirm($id)
    {
        $id = Crypt::decrypt($id);
        $payment = Payment::with('user')->findOrFail($id);
        return view('payment.confirm', compact('payment'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $payment = Payment::findOrFail(Crypt::decrypt($id));

        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/bukti'), $filename);

            $payment->proof = $filename;
            $payment->save();
        }

        return redirect('/admin')->with('success', 'Bukti pembayaran berhasil dikirim.');
    }
    public function index()
    {
        $payments = Payment::with(['user', 'officer', 'duesMember.duesCategory'])->get();
        return view('admin.payments-index', compact('payments'));
    }

    }
