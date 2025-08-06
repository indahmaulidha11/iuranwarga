@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Kategori Iuran</h3>
    <a href="{{ route('admin.dues.categories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Periode</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $i => $cat)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ ucfirst($cat->period) }}</td>
                <td>Rp{{ number_format($cat->nominal, 0, ',', '.') }}</td>
                <td>{{ $cat->status ? 'Aktif' : 'Nonaktif' }}</td>
                <td>
                    <form action="{{ route('admin.dues.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
