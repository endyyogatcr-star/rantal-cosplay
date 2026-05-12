@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')
<style>
    .admin-wrapper {
        background: linear-gradient(135deg, rgba(15, 12, 41, 0.95), rgba(48, 43, 99, 0.95)), 
                    url("{{ asset('images/Cosplaybg.png') }}") no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        margin: -24px;
        padding: 50px 40px;
        color: #e0e0e0 !important;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 30px;
        padding: 30px;
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .custom-table thead th {
        color: #d8b4fe !important; /* Warna ungu muda agar beda dengan costume */
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 15px 25px;
    }

    .custom-table tbody tr {
        background: rgba(255, 255, 255, 0.05);
        transition: 0.3s;
    }

    .custom-table td {
        padding: 20px 25px;
        color: #ffffff !important;
        border: none;
    }

    .category-name {
        font-weight: 700;
        font-size: 1.1rem;
    }
</style>

<div class="admin-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5 px-3">
            <div>
                <h1 style="font-weight: 900; margin: 0; font-size: 3rem;">
                    Category <span style="color: #9333ea;">List</span>
                </h1>
                <p style="opacity: 0.6; font-weight: 500;">ORGANIZE YOUR COSPLAY TYPES ✨</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn" style="background: #9333ea; color: white; padding: 15px 35px; border-radius: 18px; font-weight: 700;">
                + New Category
            </a>
        </div>

        <div class="glass-card">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Category Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td style="opacity: 0.4;">#{{ $category->category_id }}</td>
                        <td>
                            <div class="category-name">{{ $category->category_name }}</div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-info rounded-pill px-3 me-2">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection