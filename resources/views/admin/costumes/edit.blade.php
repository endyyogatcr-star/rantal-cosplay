@extends('admin.layouts.app')

@section('title', 'Edit Costume')

@section('content')
<style>
    .admin-wrapper {
        background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
        min-height: 100vh;
        margin: -24px;
        padding: 60px 40px;
        color: white !important;
    }

    .form-glass {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    }

    .form-label {
        color: #93c5fd !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .form-control, .form-select {
        background: rgba(255, 255, 255, 0.07) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: white !important;
        border-radius: 12px !important;
        padding: 12px 20px !important;
    }

    .form-control:focus {
        border-color: #9333ea !important;
        box-shadow: 0 0 15px rgba(147, 51, 234, 0.3) !important;
    }

    .btn-update {
        background: linear-gradient(45deg, #2563eb, #9333ea);
        border: none;
        padding: 15px 40px;
        border-radius: 15px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .current-image-preview {
        width: 100px;
        border-radius: 10px;
        border: 2px solid rgba(147, 51, 234, 0.5);
        margin-top: 10px;
    }
</style>

<div class="admin-wrapper">
    <div class="container">
        <div class="mb-5">
            <h1 style="font-weight: 900; font-size: 2.5rem; margin: 0;">Update <span style="color: #9333ea;">Vault</span></h1>
            <p style="opacity: 0.6;">Editing: <span class="text-white fw-bold">{{ $costume->name }}</span></p>
        </div>

        <div class="form-glass">
            <form action="{{ route('admin.costumes.update', $costume) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Nama Costume</label>
                        <input type="text" name="name" class="form-control" value="{{ $costume->name }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Character</label>
                        <input type="text" name="character" class="form-control" value="{{ $costume->character }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Size</label>
                        <select name="size" class="form-select">
                            <option value="S" {{ $costume->size == 'S' ? 'selected' : '' }}>S</option>
                            <option value="M" {{ $costume->size == 'M' ? 'selected' : '' }}>M</option>
                            <option value="L" {{ $costume->size == 'L' ? 'selected' : '' }}>L</option>
                            <option value="XL" {{ $costume->size == 'XL' ? 'selected' : '' }}>XL</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ $costume->stock }}" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Kategori</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $costume->category_id == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Harga Sewa (Rp)</label>
                    <input type="number" name="price" class="form-control" value="{{ $costume->price }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4">{{ $costume->description }}</textarea>
                </div>

                <div class="mb-5">
                    <label class="form-label">Ganti Gambar (Biarkan kosong jika tidak diubah)</label>
                    <input type="file" name="image" class="form-control">
                    @if($costume->image)
                        <img src="{{ asset('storage/' . $costume->image) }}" class="current-image-preview" alt="Current Image">
                    @endif
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('admin.costumes.index') }}" class="btn btn-outline-light px-4" style="border-radius: 15px;">Batal</a>
                    <button type="submit" class="btn btn-update text-white">Update Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection