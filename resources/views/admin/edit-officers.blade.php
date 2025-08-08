@extends('admin.template')

@section('title', 'Edit Petugas')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4" style="background-color: #ffe6f0; border-radius: 10px;">
        <h3 class="mb-4 text-center">Edit Data Petugas</h3>

        <form action="{{ route('officers.update', $officer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ $officer->name }}" required>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label fw-bold">Posisi</label>
                <input type="text" class="form-control" id="position" name="position" 
                       value="{{ $officer->position }}">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-warning">Perbarui</button>
                <a href="{{ route('officers') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
