@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div style="background: linear-gradient(rgba(15, 12, 41, 0.85), rgba(15, 12, 41, 0.85)), 
            url('{{ asset('images/Cosplaybg.png') }}') no-repeat center center fixed; 
            background-size: cover; 
            min-height: 100vh; 
            margin: -24px; 
            padding: 40px; 
            color: white !important;">

    <div class="container">
        <div class="mb-5">
            <h1 style="font-family: 'Arial Black', sans-serif; font-size: 3rem; font-style: italic; text-transform: uppercase; color: #ffffff; text-shadow: 4px 4px #9333ea; margin: 0;">
                 DASHBOARD ADMIN
            </h1>
            <p style="color: #d8b4fe; font-weight: bold; letter-spacing: 3px; text-transform: uppercase; margin-top: 5px;">
                Cosplay Rental Management System 
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 25px; padding: 30px; border-left: 10px solid #3b82f6;">
                    <p style="color: #3b82f6; font-weight: 800; text-transform: uppercase; font-size: 0.8rem; margin-bottom: 10px;">Total Costume</p>
                    <h2 style="font-size: 4rem; font-weight: 900; margin: 0; color: white;">12</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 25px; padding: 30px; border-left: 10px solid #22c55e;">
                    <p style="color: #22c55e; font-weight: 800; text-transform: uppercase; font-size: 0.8rem; margin-bottom: 10px;">Costume Tersedia</p>
                    <h2 style="font-size: 4rem; font-weight: 900; margin: 0; color: white;">8</h2>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 25px; padding: 30px; border-left: 10px solid #eab308;">
                    <p style="color: #eab308; font-weight: 800; text-transform: uppercase; font-size: 0.8rem; margin-bottom: 10px;">Order Hari Ini</p>
                    <h2 style="font-size: 4rem; font-weight: 900; margin: 0; color: white;">3</h2>
                </div>
            </div>
        </div>

        <div class="mt-5 d-flex gap-3">
            <a href="{{ route('admin.costumes.index') }}" class="btn" style="background: linear-gradient(45deg, #9333ea, #db2777); border: none; padding: 15px 40px; border-radius: 50px; color: white; font-weight: 900; text-transform: uppercase; font-size: 0.8rem; box-shadow: 0 4px 15px rgba(147, 51, 234, 0.5);">
                Kelola Costume
            </a>
            <a href="{{ route('admin.categories.index') }}" class="btn" style="background: rgba(255,255,255,0.1); border: 2px solid white; padding: 15px 40px; border-radius: 50px; color: white; font-weight: 900; text-transform: uppercase; font-size: 0.8rem;">
                Kelola Kategori
            </a>
        </div>
    </div>
</div>
@endsection