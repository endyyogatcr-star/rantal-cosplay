@extends('layouts.app')

@section('title', 'Shop - Rental Cosplay')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar Filter -->
        <div class="col-md-3">
            <h5>Filter Kategori</h5>
            <form>
                <select name="category" class="form-select mb-3" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_id }}" {{ request('category') == $category->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <!-- Product Grid -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between mb-4">
                <h4>Daftar Costume</h4>
                <form class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari costume..." value="{{ request('search') }}">
                    <button class="btn btn-primary">Cari</button>
                </form>
            </div>

            <div class="row">
                @foreach($costumes as $costume)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($costume->image)
                            <img src="{{ asset('storage/' . $costume->image) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h6>{{ $costume->name }}</h6>
                            <p class="text-muted small">{{ $costume->character }}</p>
                            <p class="fw-bold">Rp {{ number_format($costume->price) }}</p>
                            <p class="small text-success">Stok: {{ $costume->stock }}</p>
                            
                            <a href="{{ route('costume.show', $costume) }}" class="btn btn-primary w-100">Lihat Detail</a>
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