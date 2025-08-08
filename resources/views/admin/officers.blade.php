@extends('admin.template')

@section('content')
<div class="col-md-10 px-5 py-4">

    <!-- Card Wrapper -->
    <div class="card shadow-sm border-0" style="background-color: #ffe6eb;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Data Officer</h4>
                <a href="{{ route('officers.create') }}" class="btn btn-warning btn-sm">
                    <i class="fa fa-plus"></i> Tambah Officer
                </a>
            </div>

            <table class="table table-hover bg-white shadow-sm rounded">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($officers as $key => $officer)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $officer->name }}</td>
                        <td>{{ $officer->position ?? '-' }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('officers.edit', $officer->id) }}">Edit</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('officers.destroy', $officer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                        <td colspan="4" class="text-center text-muted">Belum ada data officer.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
             <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary mb-3">
                <i class="fa fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
    <!-- End Card Wrapper -->

</div>
@endsection
