@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Kategori Iuran</h3>
    <form action="{{ route('admin.dues.categories.store') }}" method="POST">
        @csrf
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
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.dues.categories') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
