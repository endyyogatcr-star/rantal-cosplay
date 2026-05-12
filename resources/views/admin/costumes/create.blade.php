@extends('admin.layouts.app')

@section('title', 'Tambah Costume')

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

    .form-control:focus, .form-select:focus {
        background: rgba(255, 255, 255, 0.1) !important;
        border-color: #9333ea !important;
        box-shadow: 0 0 15px rgba(147, 51, 234, 0.3) !important;
    }

    .btn-save {
        background: linear-gradient(45deg, #9333ea, #7c3aed);
        border: none;
        padding: 15px 40px;
        border-radius: 15px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.3s;
    }

    .btn-save:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(147, 51, 234, 0.4);
    }

    .btn-cancel {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 15px 40px;
        border-radius: 15px;
    }
</style>

<div class="admin-wrapper">
    <div class="container">
        <div class="mb-5">
            <h1 style="font-weight: 900; font-size: 2.5rem; margin: 0;">New <span style="color: #9333ea;">Entry</span></h1>
            <p style="opacity: 0.6;">Add a new masterpiece to your vault.</p>
        </div>

        <div class="form-glass">
            <form action="{{ route('admin.costumes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Nama Costume</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Hatsune Miku Default" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Character</label>
                        <input type="text" name="character" class="form-control" placeholder="Contoh: Miku" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Size</label>
                        <select name="size" class="form-select">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" placeholder="0" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Kategori</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Harga Sewa (Rp)</label>
                    <input type="number" name="price" class="form-control" placeholder="450000" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Detail kostum..."></textarea>
                </div>

                <div class="mb-5">
                    <label class="form-label">Gambar Costume</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('admin.costumes.index') }}" class="btn btn-cancel">Batal</a>
                    <button type="submit" class="btn btn-save text-white">Simpan Costume</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection