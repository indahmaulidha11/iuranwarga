@extends('admin.template') {{-- Sesuaikan dengan layout utama kamu --}}

@section('content')
<div class="container mt-4">
    <h4>Tambah Anggota Iuran</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dues.members.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="iduser" class="form-label">Nama Warga</label>
            <select name="iduser" class="form-select" required>
                <option value="">-- Pilih Warga --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idduescategory" class="form-label">Kategori Iuran</label>
            <select name="idduescategory" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('dues.members') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
