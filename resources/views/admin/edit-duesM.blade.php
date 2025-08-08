@extends('admin.template')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0" style="border-radius: 10px; background-color: #ffe6f0; padding: 20px;">
        <h4 class="mb-4 text-center" style="color: #d63384; font-weight: bold;">
            ✏️ Edit Anggota Iuran
        </h4>

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

        <form action="{{ route('dues.members.update', $member->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="iduser" class="form-label" style="color: #d63384; font-weight: bold;">Nama Warga</label>
                <select name="iduser" class="form-select border-pink" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $member->iduser == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="idduescategory" class="form-label" style="color: #d63384; font-weight: bold;">Kategori Iuran</label>
                <select name="idduescategory" class="form-select border-pink" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $member->idduescategory == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dues.members') }}" class="btn btn-secondary">⬅️ Kembali</a>
                <button type="submit" class="btn" style="background-color: #d63384; color: white;">💾 Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
