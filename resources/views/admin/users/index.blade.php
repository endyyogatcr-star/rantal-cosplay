@extends('admin.layouts.app')

@section('title', 'Daftar User')

@section('content')
<style>
    .admin-wrapper {
        background: linear-gradient(135deg, rgba(15, 12, 41, 0.95), rgba(48, 43, 99, 0.95)), 
                    url("{{ asset('images/cosplaybg.png') }}") no-repeat center center fixed;
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
        color: #d8b4fe !important;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 18px 25px;
        font-weight: 600;
    }

    .custom-table tbody tr {
        background: rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .custom-table tbody tr:hover {
        transform: scale(1.02);
        background: rgba(255, 255, 255, 0.08);
    }

    .custom-table td {
        padding: 22px 25px;
        color: #ffffff !important;
        border: none;
        vertical-align: middle;
    }

    .user-name {
        font-weight: 700;
        font-size: 1.1rem;
    }

    .role-badge {
        padding: 6px 18px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
    }
</style>

<div class="admin-wrapper">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5 px-3">
            <div>
                <h1 style="font-weight: 900; margin: 0; font-size: 3rem;">
                    Users <span style="color: #9333ea;">List</span>
                </h1>
                <p style="opacity: 0.6; font-weight: 500;">MANAGE ALL REGISTERED USERS ✨</p>
            </div>
            <span class="badge bg-primary fs-5 px-4 py-3">
                Total: {{ $users->total() }} Users
            </span>
        </div>

        <div class="glass-card">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Telepon</th>
                        <th>Tanggal Daftar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td style="opacity: 0.4;">#{{ $user->user_id }}</td>
                        <td>
                            <div class="user-name">{{ $user->name }}</div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="role-badge bg-danger">ADMIN</span>
                            @else
                                <span class="role-badge bg-success">USER</span>
                            @endif
                        </td>
                        <td>
                            @if($user->phone)
                                {{ $user->phone }}
                                @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.users.show', $user) }}" 
                               class="btn btn-sm btn-outline-info rounded-pill px-4">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection