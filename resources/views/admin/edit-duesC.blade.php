@extends('admin.template')

@section('content')
<div class="container mt-4">
    <h3>Edit Kategori Iuran</h3>

    
    
    <div class="mb-3">
        <label for="name">Nama Kategori</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
        </div>

        <div class="mb-3">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="period">Periode</label>
            <select name="period" class="form-control">
                <option value="mingguan" {{ $category->period == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ $category->period == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="tahunan" {{ $category->period == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal">Nominal</label>
            <input type="number" name="nominal" class="form-control" value="{{ old('nominal', $category->nominal) }}">
        </div>
        
        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        
        <form action="{{ route('categori.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
        </form>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
@endsection
