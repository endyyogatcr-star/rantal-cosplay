@extends('layouts.app')

@section('title', 'Cosplay Rental - Sewa Kostum Terbaik')

@section('content')

<style>
    .hero {
        background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), 
                    url('{{ asset("images/Cosplaybg.png") }}') center/cover no-repeat;
        min-height: 90vh;
        display: flex;
        align-items: center;
        color: white;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 20px;
    }
</style>

<!-- Hero Section dengan cosplaybg.png -->
<section class="hero text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="display-1 fw-bold mb-4">Sewa Costume Cosplay</h1>
                <p class="lead fs-3 mb-5">Kostum berkualitas tinggi siap antar ke acaramu</p>
                
                <a href="{{ route('shop') }}" class="btn btn-lg px-5 py-3 fw-bold"
                   style="background: linear-gradient(45deg, #9333ea, #c026d3); color: white; border: none;">
                    Jelajahi Koleksi Costume →
                </a>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">

    <h2 class="text-center mb-5 fw-bold text-white">Costume Unggulan</h2>

    <div class="row">
        @foreach($featuredCostumes as $costume)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card bg-dark text-white border-0 h-100 shadow" style="border-radius: 20px; overflow: hidden;">
                @if($costume->image)
                    <img src="{{ asset('storage/' . $costume->image) }}" 
                         class="card-img-top" 
                         style="height: 280px; object-fit: cover;" 
                         alt="{{ $costume->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $costume->name }}</h5>
                    <p class="text-purple">{{ $costume->character }}</p>
                    <h4 class="text-success mb-0">Rp {{ number_format($costume->price) }}</h4>
                </div>
                <div class="card-footer bg-dark border-0 pt-0">
                    <a href="{{ route('costume.show', $costume) }}" class="btn btn-outline-light w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection