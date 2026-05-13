@extends('layouts.app')

@section('title', 'Shop - Cosplay Rental')

@section('content')

<style>
    .shop-hero {
        background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), 
                    url('{{ asset("images/cosplaybg.png") }}') center/cover;
        padding: 100px 0;
        color: white;
    }
    .costume-card {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        transition: all 0.4s;
        overflow: hidden;
    }
    .costume-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(147, 51, 234, 0.3);
    }
</style>

<!-- Shop Header -->
<section class="shop-hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Koleksi Costume</h1>
        <p class="lead">Temukan kostum impianmu</p>
    </div>
</section>

<div class="container py-5">

    <div class="row">
        <!-- Filter -->
        <div class="col-md-3">
            <div class="sticky-top" style="top: 20px;">
                <h5 class="fw-bold mb-3">Filter</h5>
                
                <form method="GET">
                    <div class="mb-4">
                        <input type="text" name="search" class="form-control bg-dark text-white border-0" 
                               placeholder="Cari nama atau character..." value="{{ request('search') }}">
                    </div>

                    <h6 class="mb-3">Kategori</h6>
                    <select name="category" class="form-select bg-dark text-white border-0 mb-4" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}" {{ request('category') == $category->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <!-- Product List -->
        <div class="col-md-9">
            <div class="row">
                @foreach($costumes as $costume)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="costume-card h-100">
                        @if($costume->image)
                            <img src="{{ asset('storage/' . $costume->image) }}" 
                                 class="w-100" 
                                 style="height: 260px; object-fit: cover;" 
                                 alt="{{ $costume->name }}">
                        @endif
                        
                        <div class="p-4">
                            <h5 class="text-white">{{ $costume->name }}</h5>
                            <p class="text-purple mb-2">{{ $costume->character }}</p>
                            <h4 class="text-success">Rp {{ number_format($costume->price) }}</h4>
                            <small class="text-success">Stok: {{ $costume->stock }}</small>
                        </div>

                        <div class="px-4 pb-4">
                            <a href="{{ route('costume.show', $costume) }}" 
                               class="btn btn-outline-light w-100">
                               Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $costumes->links() }}
            </div>
        </div>
    </div>
</div>

@endsection