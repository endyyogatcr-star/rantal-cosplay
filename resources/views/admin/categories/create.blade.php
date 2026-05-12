@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

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
        max-width: 600px; /* Karena cuma satu input, kita buat agak ramping */
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    }

    .form-label {
        color: #93c5fd !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 1px;
    }

    .form-control {
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

    .btn-save {
        background: linear-gradient(45deg, #9333ea, #7c3aed);
        border: none;
        padding: 12px 35px;
        border-radius: 15px;
        font-weight: 800;
        transition: 0.3s;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(147, 51, 234, 0.4);
    }
</style>

<div class="admin-wrapper">
    <div class="container">
        <div class="mb-5">
            <h1 style="font-weight: 900; font-size: 2.5rem; margin: 0;">New <span style="color: #9333ea;">Category</span></h1>
            <p style="opacity: 0.6;">Organize your cosplay collection by type.</p>
        </div>

        <div class="form-glass">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="category_name" class="form-control" placeholder="Misal: Anime, Game, atau Tokusatsu" required>
                </div>

                <div class="d-flex gap-3 mt-5">
                    <button type="submit" class="btn btn-save text-white">Simpan Kategori</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-light px-4" style="border-radius: 15px;">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection