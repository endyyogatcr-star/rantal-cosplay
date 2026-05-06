@extends('admin.layouts.app')

@section('title', 'Daftar Costume')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Costume</h2>
        <a href="{{ route('admin.costumes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Costume
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama Costume</th>
                    <th>Character</th>
                    <th>Kategori</th>
                    <th>Size</th>
                    <th>Stock</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($costumes as $costume)
                <tr>
                    <td>{{ $costume->costume_id }}</td>
                    <td>
                        @if($costume->image)
                            <img src="{{ asset('storage/' . $costume->image) }}" width="60" height="60" class="rounded" alt="">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $costume->name }}</td>
                    <td>{{ $costume->character }}</td>
                    <td>{{ $costume->category->category_name ?? '-' }}</td>
                    <td>{{ $costume->size }}</td>
                    <td><strong>{{ $costume->stock }}</strong></td>
                    <td>Rp {{ number_format($costume->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.costumes.show', $costume) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('admin.costumes.edit', $costume) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.costumes.destroy', $costume) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus costume ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $costumes->links() }}
    </div>
@endsection