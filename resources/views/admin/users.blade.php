@extends('admin.template') <!-- Ganti jika layout kamu punya nama lain -->

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Content -->
        <div class="col-md-10 px-5 py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Users</h4>
                <a href="{{ route('users.create') }}" class="btn btn-warning">
                    <i class="fa fa-plus"></i> Tambah User
                </a>
            </div>

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
                    @foreach ($users as $key => $user)
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
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if ($users->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-muted">No users found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
