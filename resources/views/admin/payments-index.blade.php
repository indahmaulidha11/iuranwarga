@extends('admin.template') <!-- Ganti sesuai layout kamu -->

@section('content')
<div class="container mt-4">
    <h3>Daftar Pembayaran</h3>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>User</th>
                <th>Petugas</th>
                <th>Kategori Iuran</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->user->name }}</td>
                    <td>{{ $payment->officer->name }}</td>
                    <td>{{ $payment->duesMember->duesCategory->name }}</td>
                    <td>Rp{{ number_format($payment->amount, 0, ',', '.') }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>{{ $payment->paid_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
