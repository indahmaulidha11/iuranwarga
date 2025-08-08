@extends('admin.template')

@section('title', 'Tambah User')

@section('content')
<div class="container mt-5">
    <!-- Card Wrapper -->
    <div class="card shadow-sm border-0" style="background-color: #ffe6eb;">
        <div class="card-body">
            <h3 class="mb-4">Tambah User Baru</h3>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="nohp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Level</label>
                    <select name="level" class="form-control" required>
                        <option value="warga">Warga</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
    <!-- End Card Wrapper -->
</div>
@endsection
