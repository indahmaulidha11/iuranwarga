@extends('admin.template')

@section('content')
<div class="container mt-4">
    <div class="card shadow p-4" 
         style="background-color: rgba(255, 230, 240, 0.8); backdrop-filter: blur(10px); border-radius: 12px;">
        
        <h3 class="mb-4 text-center">Edit Kategori Iuran</h3>

        {{-- FORM EDIT --}}
        <form action="{{ route('categori.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" class="form-control" 
                       value="{{ old('name', $category->name) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="period" class="form-label">Periode</label>
                <select name="period" class="form-control">
                    <option value="mingguan" {{ $category->period == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                    <option value="bulanan" {{ $category->period == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                    <option value="tahunan" {{ $category->period == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="number" name="nominal" class="form-control" 
                       value="{{ old('nominal', $category->nominal) }}">
            </div>
            
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('dues.categori') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

        {{-- FORM HAPUS --}}
        <form action="{{ route('categori.destroy', $category->id) }}" method="POST" 
              class="mt-3" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">Hapus</button>
        </form>
    </div>
</div>
@endsection
