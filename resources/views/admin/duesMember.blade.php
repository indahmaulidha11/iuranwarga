@extends('admin.template')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-10 px-5 py-4">
            
            <!-- Pink Box Wrapper -->
            <div style="background-color: pink; padding: 20px; border-radius: 10px;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Data Anggota Iuran</h4>
                    <a href="{{ route('dues.members.create') }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-plus"></i> Tambah Anggota
                    </a>
                </div>

                <table class="table table-hover bg-white shadow-sm rounded">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Kategori Iuran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $key => $member)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $member->user->name ?? '-' }}</td>
                            <td>{{ $member->category->name ?? '-' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle" data-bs-toggle="dropdown">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('dues.members.edit', $member->id) }}">Edit</a></li>
                                        <li>
                                            <form action="{{ route('dues.members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item text-danger">Hapus</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Data belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- End Pink Box Wrapper -->

        </div>
    </div>
</div>
@endsection
