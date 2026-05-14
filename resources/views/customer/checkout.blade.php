@extends('layouts.app')

@section('title', 'Checkout - Cosplay Rental')

@section('content')
<style>
    .checkout-wrapper {
        background: linear-gradient(135deg, rgba(15,12,41,0.95), rgba(48,43,99,0.95)), 
                    url("{{ asset('images/cosplaybg.png') }}") center/cover fixed;
        min-height: 100vh;
        padding: 60px 20px;
        color: #e0e0e0;
    }
    .glass-checkout {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 25px;
        padding: 40px;
    }
</style>

<div class="checkout-wrapper">
    <div class="container">
        <h1 class="text-center mb-5 fw-bold">Checkout Sewa</h1>

        <div class="row">
            <!-- Form Tanggal -->
            <div class="col-lg-7">
                <div class="glass-checkout">
                    <h4 class="mb-4">📅 Pilih Tanggal Sewa</h4>
                    
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Mulai Sewa</label>
                                <input type="date" name="start_date" class="form-control bg-dark text-white" 
                                       min="{{ now()->format('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Kembali</label>
                                <input type="date" name="end_date" class="form-control bg-dark text-white" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 mt-4">
                            Lanjut ke Konfirmasi Order
                        </button>
                    </form>
                </div>
            </div>

            <!-- Ringkasan Keranjang -->
            <div class="col-lg-5">
                <div class="glass-checkout sticky-top" style="top: 20px;">
                    <h5 class="mb-4">Ringkasan Order</h5>
                    @foreach($cart as $item)
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            @if($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" width="60" height="60" style="object-fit: cover; border-radius: 8px;">
                            @endif
                        </div>
                        <div class="flex-grow-1">
                            <strong>{{ $item['name'] }}</strong><br>
                            <small class="text-purple">{{ $item['character'] }}</small>
                        </div>
                        <div class="text-end">
                            <strong>Rp {{ number_format($item['price']) }}</strong>
                        </div>
                    </div>
                    @endforeach

                    <hr>
                    <div class="d-flex justify-content-between fs-4">
                        <strong>Total</strong>
                        <strong class="text-success">Rp {{ number_format($total) }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection