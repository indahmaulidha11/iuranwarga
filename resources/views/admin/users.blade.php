@extends('admin.template') <!-- Ganti jika layout kamu punya nama lain -->

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-primary text-white py-4" style="min-height: 100vh;">
            <h4 class="text-center mb-4">eProduct</h4>
            <ul class="nav flex-column fw-semibold">
                <li class="nav-item mb-2"><a class="nav-link text-white" href="#">Dashboard</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white active" href="#">User</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white" href="#">Product</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white" href="#">Stock</a></li>
                <li class="nav-item mb-2"><a class="nav-link text-white" href="#">Offer</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="col-md-10 px-5 py-4">
            <h4 class="mb-3">Users</h4>
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
