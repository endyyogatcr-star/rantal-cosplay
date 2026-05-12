@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">🎉 Selamat Datang di Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5>Total Costume</h5>
                        <h2>12</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5>Costume Tersedia</h5>
                        <h2>8</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5>Order Hari Ini</h5>
                        <h2>3</h2>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.costumes.index') }}" class="btn btn-primary btn-lg mt-3">
            Kelola Costume
        </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-lg mt-3">
            Kelola Kategori
        </a>
    </div>
@endsection