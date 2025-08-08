@extends('admin.template')

@section('content')
<div class="container mt-4">
    <div class="card shadow p-4" 
         style="background-color: rgba(255, 230, 240, 0.8); backdrop-filter: blur(10px); border-radius: 12px;">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="m-0">Daftar Kategori Iuran</h1>
            <a href="{{ route('categori.create') }}" 
               class="btn btn-warning btn-sm px-3 py-2">
                + Tambah Kategori
            </a>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Periode</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dues_categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categori.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('categori.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
