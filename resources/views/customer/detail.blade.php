@extends('layouts.app')

@section('title', $costume->name . ' - Cosplay Rental')

@section('content')

<style>
    .detail-card {
        background: rgba(255, 255, 255, 0.07);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 24px;
    }
</style>

<div class="container py-5">
    <div class="row">

        <!-- Gambar -->
        <div class="col-lg-6 mb-4">
            @if($costume->image)
                <img src="{{ asset('storage/' . $costume->image) }}" 
                     class="img-fluid rounded-4 shadow" 
                     style="width: 100%; max-height: 550px; object-fit: cover;" 
                     alt="{{ $costume->name }}">
            @else
                <div class="bg-dark rounded-4 d-flex align-items-center justify-content-center" style="height: 550px;">
                    <h1 class="text-muted">No Image</h1>
                </div>
            @endif
        </div>

        <!-- Informasi -->
        <div class="col-lg-6">
            <div class="detail-card p-5 h-100">
                <h1 class="fw-bold text-white">{{ $costume->name }}</h1>
                <h4 class="text-purple">{{ $costume->character }}</h4>
                
                <hr style="border-color: rgba(255,255,255,0.1);">

                <h2 class="text-success fw-bold">Rp {{ number_format($costume->price) }} / hari</h2>
                
                <div class="my-4">
                    <p><strong>Size:</strong> {{ $costume->size }}</p>
                    <p><strong>Stok Tersedia:</strong> <span class="text-success">{{ $costume->stock }} pcs</span></p>
                    <p><strong>Kategori:</strong> {{ $costume->category->category_name ?? '-' }}</p>
                </div>

                <div class="mb-4">
                    <strong>Deskripsi:</strong>
                    <p class="text-light">{{ $costume->description ?? 'Tidak ada deskripsi untuk kostum ini.' }}</p>
                </div>

                <div class="d-grid gap-2">
                    <button onclick="alert('Fitur Sewa akan segera ditambahkan!')" 
                            class="btn btn-success btn-lg py-3">
                        <i class="fas fa-shopping-cart"></i> Sewa Sekarang
                    </button>
                    <a href="{{ route('shop') }}" class="btn btn-outline-light">← Kembali ke Shop</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Costumes -->
    <h4 class="mt-5 mb-4 text-white">Costume Serupa</h4>
    <div class="row">
        @foreach($relatedCostumes as $related)
        <div class="col-md-3 col-6">
            <a href="{{ route('costume.show', $related) }}" class="text-decoration-none">
                <div class="costume-card">
                    @if($related->image)
                        <img src="{{ asset('storage/' . $related->image) }}" class="w-100" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="p-3">
                        <h6 class="text-white">{{ $related->name }}</h6>
                        <p class="small text-purple mb-0">{{ $related->character }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection