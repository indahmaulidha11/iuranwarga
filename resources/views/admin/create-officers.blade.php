@extends('admin.template')

@section('title', 'Tambah Petugas')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Tambah Petugas</h3>

    <form action="{{ route('officers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="position" name="position">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('officers') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
