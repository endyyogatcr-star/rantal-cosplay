@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card bg-dark text-white border-0 shadow" style="border-radius: 20px;">
                <div class="card-header bg-dark border-0 py-4 text-center">
                    <h2 class="mb-0">👤 Profil Saya</h2>
                </div>
                <div class="card-body p-5">

                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control bg-secondary text-white border-0" 
                                       value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control bg-secondary text-white border-0" 
                                       value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" name="phone" class="form-control bg-secondary text-white border-0" 
                                   value="{{ old('phone', $user->phone) }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="address" class="form-control bg-secondary text-white border-0" rows="3">{{ old('address', $user->address) }}</textarea>
                        </div>

                        <hr class="my-5">

                        <h5 class="mb-4">Ubah Password</h5>

                        <div class="mb-4">
                            <label class="form-label">Password Saat Ini</label>
                            <input type="password" name="current_password" class="form-control bg-secondary text-white border-0">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Password Baru</label>
                                <input type="password" name="password" class="form-control bg-secondary text-white border-0">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" class="form-control bg-secondary text-white border-0">
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection