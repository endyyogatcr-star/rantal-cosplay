@extends('layouts.app')

@section('title', 'Keranjang Sewa - Cosplay Rental')

@section('content')

<style>
    .cart-wrapper {
        background: linear-gradient(135deg, rgba(15, 12, 41, 0.95), rgba(48, 43, 99, 0.95)), 
                    url("{{ asset('images/cosplaybg.png') }}") no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        padding: 60px 20px;
        color: #e0e0e0;
    }

    .glass-cart {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 25px;
        padding: 35px;
    }

    .cart-item {
        background: rgba(255, 255, 255, 0.06);
        border-radius: 18px;
        transition: 0.3s;
    }
</style>

<div class="cart-wrapper">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="fw-bold">🛒 Keranjang Sewa</h1>
            <a href="{{ route('shop') }}" class="btn btn-outline-light">← Lanjut Belanja</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(count($cart) > 0)
            <div class="glass-cart">
                <div class="row">
                    <!-- List Item -->
                    <div class="col-lg-8">
                        @foreach($cart as $id => $item)
                        <div class="cart-item p-4 mb-3 d-flex">
                            <div class="me-4">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" 
                                         width="100" height="100" 
                                         style="object-fit: cover; border-radius: 12px;" 
                                         alt="">
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="text-white">{{ $item['name'] }}</h5>
                                <p class="text-purple mb-1">{{ $item['character'] }}</p>
                                <p class="fw-bold fs-5 text-success">Rp {{ number_format($item['price']) }}</p>
                            </div>
                            <div>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Ringkasan Order -->
                    <div class="col-lg-4">
                        <div class="glass-cart sticky-top" style="top: 20px;">
                            <h4 class="mb-4">Ringkasan Sewa</h4>
                            
                            <div class="d-flex justify-content-between mb-3">
                                <span>Total Costume</span>
                                <strong>{{ count($cart) }} item</strong>
                            </div>
                            
                            <div class="d-flex justify-content-between mb-4 fs-4">
                                <span>Total Harga</span>
                                <strong class="text-success">Rp {{ number_format($total) }}</strong>
                            </div>

                            <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg w-100 py-3">
                                Lanjut ke Checkout →
                            </a>

                            <p class="text-center text-muted small mt-3">
                                Kamu akan diarahkan ke halaman pilih tanggal sewa
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Cart Kosong -->
            <div class="glass-cart text-center py-5">
                <h3 class="mb-4">Keranjang Anda Kosong</h3>
                <p class="lead mb-4">Silakan pilih costume yang ingin disewa</p>
                <a href="{{ route('shop') }}" class="btn btn-primary btn-lg">Lihat Koleksi Costume</a>
            </div>
        @endif
    </div>
</div>

@endsection