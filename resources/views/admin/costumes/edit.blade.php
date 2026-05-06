@extends('admin.layouts.app')

@section('title', 'Edit Costume')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Costume: {{ $costume->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.costumes.update', $costume) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Costume</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $costume->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Character</label>
                            <input type="text" name="character" class="form-control" value="{{ old('character', $costume->character) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}" 
                                        {{ $costume->category_id == $category->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Size</label>
                            <input type="text" name="size" class="form-control" value="{{ old('size', $costume->size) }}" required placeholder="S, M, L, XL, XXL">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('stock', $costume->stock) }}" required min="0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price', $costume->price) }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description', $costume->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    @if($costume->image)
                        <img src="{{ asset('storage/' . $costume->image) }}" class="img-thumbnail" width="200" alt="Current Image">
                    @else
                        <p class="text-muted">Belum ada gambar</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Ganti Gambar (Opsional)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Update Costume</button>
                    <a href="{{ route('admin.costumes.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection