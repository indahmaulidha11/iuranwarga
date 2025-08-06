@extends('admin.template') {{-- Ganti jika layout kamu punya nama lain --}}

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-primary text-white py-4" style="min-height: 100vh;">
            <h4 class="text-center mb-4">IURAN<span class="d-block">WARGA</span></h4>
            <ul class="nav flex-column fw-semibold">
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('admin.users') }}">Kelola User</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white active" href="{{ route('admin.officers') }}">Kelola Officer</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('admin.dues.categories') }}">Kategori Iuran</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('admin.dues.members') }}">Anggota Iuran</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white" href="{{ route('admin.payments') }}">Pembayaran</a></li>
                <li class="nav-item mt-4">
                    <a class="nav-link text-white" href="/login">
                        <i class="fa fa-user"></i> Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="col-md-10 px-5 py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Data Officer</h4>
                <a href="{{ route('admin.officers.create') }}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Tambah Officer
                </a>
            </div>

            <table class="table table-hover bg-white shadow-sm rounded">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($officers as $key => $officer)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $officer->name }}</td>
                        <td>{{ $officer->username }}</td>
                        <td>{{ $officer->nohp ?? '-' }}</td>
                        <td>{{ $officer->address ?? '-' }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.officers.edit', $officer->id) }}">Edit</a></li>
                                    <li>
                                        <form action="{{ route('admin.officers.destroy', $officer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger" type="submit">Hapus</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data officer.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
