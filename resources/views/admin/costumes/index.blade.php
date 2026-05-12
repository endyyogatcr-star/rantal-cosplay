@extends('admin.layouts.app')

@section('title', 'Daftar Costume')

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
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 30px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .custom-table thead th {
        color: #93c5fd !important;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 2px;
        padding: 15px 25px;
        border: none;
    }

    .custom-table tbody tr {
        background: rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .custom-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-3px);
    }

    .custom-table td {
        padding: 20px 25px;
        color: #ffffff !important;
        border: none;
    }

    .custom-table td:first-child { border-radius: 15px 0 0 15px; }
    .custom-table td:last-child { border-radius: 0 15px 15px 0; }

    .costume-name {
        font-weight: 700;
        font-size: 1.1rem;
        color: #ffffff !important;
    }

    .price-tag {
        color: #4ade80 !important;
        font-weight: 800;
    }

    .badge-category {
        background: rgba(147, 51, 234, 0.2);
        border: 1px solid rgba(147, 51, 234, 0.5);
        color: #d8b4fe !important;
        padding: 6px 16px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .btn-action {
        padding: 8px 18px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-edit { border: 1px solid #0ea5e9; color: #0ea5e9 !important; }
    .btn-edit:hover { background: #0ea5e9; color: white !important; }

    .btn-delete { border: 1px solid #ef4444; color: #ef4444 !important; }
    .btn-delete:hover { background: #ef4444; color: white !important; }
</style>

<div class="admin-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5 px-3">
            <div>
                <h1 style="font-weight: 900; letter-spacing: -1px; margin: 0; font-size: 3rem;">
                    Costume <span style="color: #9333ea;">Vault</span>
                </h1>
                <p style="opacity: 0.6; font-weight: 500; margin-top: 5px;">MANAGE YOUR PREMIUM COSPLAY INVENTORY ✨</p>
            </div>
            <a href="{{ route('admin.costumes.create') }}" class="btn" style="background: #9333ea; color: white; padding: 15px 35px; border-radius: 18px; font-weight: 700; box-shadow: 0 10px 20px rgba(147, 51, 234, 0.3);">
                + New Costume
            </a>
        </div>

        <div class="glass-card">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Cosplay Name</th>
                        <th>Category</th>
                        <th>Rate / Day</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($costumes as $costume)
                    <tr>
                        <td style="opacity: 0.4;">#{{ $loop->iteration }}</td>
                        <td>
                            <div class="costume-name">{{ $costume->name }}</div>
                        </td>
                        <td>
                            <span class="badge-category">
                                {{ $costume->category->category_name ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td>
                            <div class="price-tag">Rp {{ number_format($costume->price, 0, ',', '.') }}</div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.costumes.edit', $costume) }}" class="btn-action btn-edit me-2">Edit</a>
                            <form action="{{ route('admin.costumes.destroy', $costume) }}" method="POST" class="d-inline" onsubmit="return confirm('Archive this costume?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-action btn-delete bg-transparent">Delete</button>
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