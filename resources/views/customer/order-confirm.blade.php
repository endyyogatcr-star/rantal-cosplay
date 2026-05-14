@extends('layouts.app')

@section('title', 'Konfirmasi Order')

@section('content')
<style>
    .confirm-wrapper {
        background: linear-gradient(135deg, rgba(15,12,41,0.95), rgba(48,43,99,0.95)), 
                    url("{{ asset('images/cosplaybg.png') }}") center/cover fixed;
        min-height: 100vh;
        padding: 60px 20px;
        color: #e0e0e0;
    }
</style>

<div class="confirm-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="glass-card p-5 text-center">
                    <h2 class="mb-4">Konfirmasi Order Sewa</h2>
                    
                    <div class="mb-5">
                        <h4>Tanggal Sewa</h4>
                        <h5>{{ \Carbon\Carbon::parse($checkoutData['start_date'])->format('d F Y') }} 
                            s/d 
                            {{ \Carbon\Carbon::parse($checkoutData['end_date'])->format('d F Y') }}
                        </h5>
                        <p class="text-success">({{ $checkoutData['days'] }} hari)</p>
                    </div>

                    <h4 class="mb-3">Total Pembayaran</h4>
                    <h1 class="text-success fw-bold">Rp {{ number_format($checkoutData['total_price']) }}</h1>

                    <form action="{{ route('order.store') }}" method="POST" class="mt-5">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg px-5 py-3">
                            ✅ Konfirmasi & Buat Order
                        </button>
                    </form>

                    <a href="{{ route('checkout.index') }}" class="btn btn-outline-light mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection