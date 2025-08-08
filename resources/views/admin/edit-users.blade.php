@extends('admin.template')

@section('content')
<div class="container mt-4">
    <div class="card p-4" style="background-color: #ffe6f0; border-radius: 10px;">
        <h2 class="mb-4">Edit User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="nohp" class="form-control" value="{{ old('nohp', $user->nohp) }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
            </div>

            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-select">
                    <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="warga" {{ $user->level == 'warga' ? 'selected' : '' }}>Warga</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('users') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
