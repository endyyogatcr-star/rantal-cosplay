@extends('layouts.app')  {{-- kita pakai layout default Breeze dulu --}}

@section('title', 'Rental Cosplay - Beranda')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 text-center mb-5">
            <h1 class="display-4 fw-bold">🎭 Sewa Costume Terbaik</h1>
            <p class="lead">Temukan kostum cosplay favoritmu dengan harga terjangkau</p>
            <a href="{{ route('shop') }}" class="btn btn-primary btn-lg">Lihat Semua Costume</a>
        </div>
    </div>

    <!-- Featured Costumes -->
    <h3 class="mb-4">Costume Unggulan</h3>
    <div class="row">
        @foreach($featuredCostumes as $costume)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                @if($costume->image)
                    <img src="{{ asset('storage/' . $costume->image) }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="">
                @else
                    <div class="card-img-top bg-secondary" style="height: 250px;"></div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $costume->name }}</h5>
                    <p class="text-muted">{{ $costume->character }}</p>
                    <p class="fw-bold">Rp {{ number_format($costume->price) }}</p>
                    <a href="{{ route('costume.show', $costume) }}" class="btn btn-primary w-100">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection