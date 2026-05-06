@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h2>Tambah Kategori Baru</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="category_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection