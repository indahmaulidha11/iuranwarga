@extends('admin.template')

@section('title', 'Edit Petugas')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Edit Data Petugas</h3>

    <form action="{{ route('officers.update', $officer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $officer->name }}" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $officer->position }}">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('officers') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
