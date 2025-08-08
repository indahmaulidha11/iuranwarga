@extends('admin.template')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 px-5 py-4">

            <!-- Card Wrapper -->
            <div class="card shadow-sm border-0" style="background-color: #ffe6eb;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Users</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-warning">
                            <i class="fa fa-plus"></i> Tambah User
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-hover shadow-sm rounded bg-white">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                            <tr class="{{ $key % 2 == 0 ? 'bg-light' : '' }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->nohp ?? '-' }}</td>
                                <td>{{ $user->address ?? '-' }}</td>
                                <td>
                                    <span class="badge {{ $user->level == 'admin' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($user->level) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No users found.</td>
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
    </div>
</div>
@endsection
