@extends('admin.layouts.app')

@section('title', 'Tambah Costume')

@section('content')
    <h2>Tambah Costume Baru</h2>

    <form action="{{ route('admin.costumes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nama Costume</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Character</label>
                    <input type="text" name="character" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Size</label>
                    <input type="text" name="size" class="form-control" required placeholder="S, M, L, XL">
                </div>
                <div class="mb-3">
                    <label>Stock</label>
                    <input type="number" name="stock" class="form-control" required min="0">
                </div>
                <div class="mb-3">
                    <label>Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Costume</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Simpan Costume</button>
        <a href="{{ route('admin.costumes.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection