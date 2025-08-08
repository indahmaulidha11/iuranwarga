@extends('admin.template')

@section('content')
<div class="container mt-4">
    <div class="card shadow p-4" style="background-color: #ffe6f0; border-radius: 10px;">
        <h3 class="mb-4 text-center">Tambah Kategori Iuran</h3>

        <form action="{{ route('categori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="period" class="form-label">Periode</label>
                <select name="period" class="form-control" required>
                    <option value="">-- Pilih Periode --</option>
                    <option value="mingguan">Mingguan</option>
                    <option value="bulanan">Bulanan</option>
                    <option value="tahunan">Tahunan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="number" name="nominal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dues.categori') }}" class="btn btn-secondary">Kembali</a>
                <button class="btn btn-warning">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
