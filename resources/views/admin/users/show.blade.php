@extends('admin.layouts.app')

@section('title', 'Detail User - ' . $user->name)

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>👤 Detail Pengguna</h2>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            ← Kembali ke Daftar User
        </a>
    </div>

    <div class="row">
        <!-- Informasi Utama -->
        <div class="col-lg-8">
            <div class="card bg-dark text-white border-0 shadow mb-4">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto" 
                                 style="width: 150px; height: 150px; font-size: 4rem;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold">{{ $user->name }}</h3>
                            <p class="text-purple fs-5">{{ $user->email }}</p>
                            
                            <div class="mt-4">
                                @if($user->role == 'admin')
                                    <span class="badge bg-danger fs-6 px-4 py-2">ADMIN</span>
                                @else
                                    <span class="badge bg-success fs-6 px-4 py-2">USER</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr class="border-secondary">

                    <div class="row text-center">
                        <div class="col-md-4">
                            <strong>Nomor Telepon</strong><br>
                            <span class="fs-5">{{ $user->phone ?? '-' }}</span>
                        </div>
                        <div class="col-md-4">
                            <strong>Tanggal Daftar</strong><br>
                            <span class="fs-5">{{ $user->created_at->format('d F Y') }}</span>
                        </div>
                        <div class="col-md-4">
                            <strong>Terakhir Update</strong><br>
                            <span class="fs-5">{{ $user->updated_at->format('d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            @if($user->address)
            <div class="card bg-dark text-white border-0 shadow">
                <div class="card-header bg-dark">
                    <h5>📍 Alamat Lengkap</h5>
                </div>
                <div class="card-body">
                    <p>{{ $user->address }}</p>
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar Info -->
        <div class="col-lg-4">
            <div class="card bg-dark text-white border-0 shadow">
                <div class="card-body">
                    <h5 class="mb-3">Informasi Akun</h5>
                    <ul class="list-group list-group-flush bg-transparent">
                        <li class="list-group-item bg-transparent border-secondary text-white d-flex justify-content-between">
                            <span>ID User</span>
                            <strong>{{ $user->user_id }}</strong>
                        </li>
                        <li class="list-group-item bg-transparent border-secondary text-white d-flex justify-content-between">
                            <span>Status Email</span>
                            <strong>{{ $user->email_verified_at ? 'Terverifikasi' : 'Belum Verifikasi' }}</strong>
                        </li>
                        <li class="list-group-item bg-transparent border-secondary text-white d-flex justify-content-between">
                            <span>Role</span>
                            <strong>{{ ucfirst($user->role) }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection