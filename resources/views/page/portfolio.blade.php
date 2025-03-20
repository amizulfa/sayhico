@extends('layouts.layout')

@section('landingpage')
<style>
    /* HERO SECTION */
    .hero {
        position: relative;
        width: 100%;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: black;
        font-weight: bold;
        overflow: hidden;
    }

    /* Hero Background Image */
    .hero img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }

    /* Efek gradient fade di bagian bawah hero */
    .hero::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height:250px;
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, white 100%);
    }

    /* PORTFOLIO SECTION */
    .portfolio-container {
        text-align: center;
        padding: 50px 20px;
        background: white;
    }

    /* Agar paragraf sejajar dengan grid gambar */
    .portfolio-description {
        max-width: 1000px;
        margin: 0 auto 20px;
        padding: 0 10px;
    }

    /* GRID LAYOUT 2 BARIS, 5 KOLOM */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: auto auto;
        gap: 10px;
        justify-content: center;
        max-width: 1000px;
        margin: auto;
    }

    /* Style Gambar */
    .portfolio-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        display: block;
        transition: transform 0.3s ease-in-out;
    }

    .portfolio-item img:hover {
        transform: scale(1.05);
    }
</style>

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
