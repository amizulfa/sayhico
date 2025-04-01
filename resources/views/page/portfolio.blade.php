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
        <!-- Baris 1 -->
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/1.jpg') }}" alt="Kue 1"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/3.jpg') }}" alt="Kue 3"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/4.jpg') }}" alt="Kue 4"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/5.jpg') }}" alt="Kue 5"></div>

        <!-- Baris 2 -->
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/6.jpg') }}" alt="Kue 6"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/7.jpg') }}" alt="Kue 7"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/8.jpg') }}" alt="Kue 8"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/9.jpg') }}" alt="Kue 9"></div>
    </div>
</div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page/portfolio.css') }}">
@endsection