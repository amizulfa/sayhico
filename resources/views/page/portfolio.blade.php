@extends('layouts.layout')

@section('landingpage')
<!-- Hero Section -->
<div class="hero">
    <!-- Gambar Background -->
    <img src="{{ asset('images/portfolio/hero.jpg') }}" alt="Hero Background">
    <h1 class="fw-bold">P o r t f o l i o</h1>
    
</div>

<!-- Portfolio Section -->
<div class="portfolio-container">
    <p class="portfolio-description text-dark">
        Temukan berbagai proyek, kolaborasi, dan kreasi spesial yang telah kami buat, mulai dari hampers eksklusif hingga pesanan khusus untuk berbagai acara. 
        Jelajahi portofolio kami dan rasakan sendiri kelezatan yang selalu membuat Anda ingin kembali!
    </p>

    <!-- Grid Portfolio 2 Baris x 5 Kolom -->
    <div class="portfolio-grid">
        @foreach ($portfolio as $p)
        <div class="portfolio-item"><img src="{{ asset('storage/' . $p->gambar_port) }}"></div>
        @endforeach
    </div>
</div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page/portfolio.css') }}">
@endsection