@extends('template')

@section('title')
    Konfirmasi Pembayaran
@endsection

@section('content')
<div class="container d-flex justify-content-center mt-5">
    <form action="/payment/{{ Crypt::encrypt($payment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow-sm p-4" style="max-width: 500px; width: 100%;">
            <h5>Konfirmasi Pembayaran</h5>
            <div class="bg-light p-3 rounded mb-3">
                <p>Detail:</p>
                <span>Tanggal: {{ $payment->created_at->format('d-m-Y') }}</span><br>
                <span>Periode: {{ ucfirst($payment->period) }}</span><br>
                <span>Nominal: Rp. {{ number_format($payment->nominal, 0, ',', '.') }}</span><br>
                <span>Warga: {{ $payment->user->name }}</span><br>
                <span>Petugas: {{ $payment->petugas }}</span>
            </div>

            <label for="proof">Upload Bukti Pembayaran</label>
            <input type="file" name="proof" id="proof" class="form-control mb-3">

            <div class="d-flex gap-2">
                <a href="/dashboard" class="btn btn-outline-secondary w-50">Batal</a>
                <button type="submit" class="btn text-white w-50" style="background-color: #7b6efe">Konfirmasi</button>
            </div>
        </div>
    </form>
</div>
@endsection
