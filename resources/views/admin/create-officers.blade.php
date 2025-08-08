@extends('admin.template')

@section('title', 'Tambah Petugas')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4" style="background-color: #ffe6f0; border-radius: 10px;">
        <h3 class="mb-4 text-center">Tambah Petugas</h3>

        <form action="{{ route('officers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label fw-bold">Posisi</label>
                <input type="text" class="form-control" id="position" name="position">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('officers') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
