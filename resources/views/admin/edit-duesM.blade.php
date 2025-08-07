@extends('admin.template')

@section('content')
<div class="container mt-4">
    <h4>Edit Anggota Iuran</h4>

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
            <label for="iduser" class="form-label">Nama Warga</label>
            <select name="iduser" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $member->iduser == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idduescategory" class="form-label">Kategori Iuran</label>
            <select name="idduescategory" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $member->idduescategory == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('dues.members') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
</div>
@endsection
