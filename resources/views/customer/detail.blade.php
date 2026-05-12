@extends('layouts.app')

@section('title', $costume->name)

@section('content')
<div class="container py-5">
    <div class="row">

        <!-- Gambar Costume -->
        <div class="col-lg-6">
            @if($costume->image)
                <img src="{{ asset('storage/' . $costume->image) }}" class="img-fluid rounded shadow" alt="{{ $costume->name }}">
            @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 500px; border-radius: 10px;">
                    <h1>No Image</h1>
                </div>
            @endif
        </div>

        <!-- Informasi Costume -->
        <div class="col-lg-6">
            <h1 class="mb-3">{{ $costume->name }}</h1>
            <h4 class="text-muted">{{ $costume->character }}</h4>
            
            <hr>
            
            <div class="mb-4">
                <h4 class="fw-bold text-primary">Rp {{ number_format($costume->price) }}/hari</h4>
                <p class="text-success"><strong>Stok tersedia: {{ $costume->stock }} pcs</strong></p>
            </div>

            <div class="mb-4">
                <strong>Size:</strong> {{ $costume->size }} <br>
                <strong>Kategori:</strong> {{ $costume->category->category_name ?? '-' }}
            </div>

            <div class="mb-4">
                <strong>Deskripsi:</strong>
                <p>{{ $costume->description ?? 'Tidak ada deskripsi.' }}</p>
            </div>

            <!-- Tombol Sewa -->
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-success btn-lg">
                    <i class="fas fa-shopping-cart"></i> Sewa Sekarang
                </a>
                <a href="{{ route('shop') }}" class="btn btn-outline-secondary">
                    ← Kembali ke Shop
                </a>
            </div>
        </div>
    </div>

    <!-- Related Costumes -->
    <h4 class="mt-5 mb-4">Costume Lainnya yang Mungkin Anda Sukai</h4>
    <div class="row">
        @foreach($relatedCostumes as $related)
        <div class="col-md-3 col-6 mb-4">
            <div class="card h-100">
                @if($related->image)
                    <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h6>{{ $related->name }}</h6>
                    <p class="small text-muted">{{ $related->character }}</p>
                    <p class="fw-bold">Rp {{ number_format($related->price) }}</p>
                    <a href="{{ route('costume.show', $related) }}" class="btn btn-sm btn-primary w-100">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection