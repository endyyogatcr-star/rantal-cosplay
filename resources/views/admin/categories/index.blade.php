@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Kategori</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->category_id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Yakin hapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection