@extends('layouts.layout')

@section('landingpage') 
<!-- Hero Section -->
<div class="cta-section">
    <img src="{{ asset('images/herotk.jpg') }}" alt="Say_Hi Cookies">
    <div class="cta-content">
        <h1 class="fw-bold">T e n t a n g  K a m i</h1>
    </div>
</div>

<!-- Cerita Kami Section -->
<div class="story-section">
    <div class="story-text">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et 
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
            eu fugiat nulla pariatur.
        </p>
    </div>
    <div class="story-title">
        <h2>Cerita Kami</h2>
        <h1>Cerita di balik layar <br> Say_Hi.Co</h1>
    </div>
</div>



<!-- Portfolio Section -->
<div class="portfolio-container">
    <div class="portfolio-grid">
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/1.jpg') }}" alt="Kue 1"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/5.jpg') }}" alt="Kue 2"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/3.jpg') }}" alt="Kue 3"></div>
        <div class="portfolio-item"><img src="{{ asset('images/portfolio/4.jpg') }}" alt="Kue 4"></div>
    </div>
</div>

<!-- Tentang Kami Section -->
<div class="about-section">
    <div class="about-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Say_Hi.Co Logo">
    </div>
    <div class="about-text">
        <h2>Tentang Kami</h2>
        <h1>Mengenal Lebih Dekat <br> Say_Hi.Co</h1>
        <p>
            Say_Hi.Co hadir sebagai penyedia aneka kue dan hampers berkualitas premium yang dibuat dengan bahan pilihan. 
            Kami berkomitmen untuk memberikan pengalaman rasa yang istimewa dalam setiap gigitan.
        </p>
    </div>
</div>

<!-- Keunggulan Kami -->
<div class="keunggulan position-relative mb-5">
    <div class="container text-center py-5">
        <h2 class="font-weight-bold">Kenapa Harus Say_Hi.Co?</h2>
        <p>Di Say_Hi.Co, kami menghadirkan cookies premium dengan cita rasa istimewa yang dibuat dari bahan berkualitas terbaik. Kami berkomitmen untuk memberikan pengalaman manis yang tak terlupakan dalam setiap gigitan.</p>
    </div>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-5 d-flex align-items-center gap-3 mb-4 px-lg-5 px-md-4">
                <img src="{{ asset('images/landingpage/keunggulan1.png') }}" alt="Homemade" width="80">
                <div class="text-md-start">
                    <h5 class="fw-bold">Homemade & Fresh</h5>
                    <p>Dibuat dengan cinta, selalu fresh di setiap pesanan.</p>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-center gap-3 mb-4 px-lg-5 px-md-4">
                <div class="text-md-end">
                    <h5 class="fw-bold">Bahan Berkualitas</h5>
                    <p>Menggunakan bahan pilihan terbaik untuk rasa yang lebih istimewa.</p>
                </div>
                <img src="{{ asset('images/landingpage/keunggulan3.png') }}" alt="Bahan Berkualitas" width="80">
            </div>
            <div class="col-md-5 d-flex align-items-center gap-3 mb-4 px-lg-5 px-md-4">
                <img src="{{ asset('images/landingpage/keunggulan2.png') }}" alt="Harga Terjangkau" width="80">
                <div class="text-md-start">
                    <h5 class="fw-bold">Harga Terjangkau</h5>
                    <p>Kelezatan premium dengan harga yang tetap ramah di kantong.</p>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-center gap-3 mb-4 px-lg-5 px-md-4">
                <div class="text-md-end text-right">
                    <h5 class="fw-bold">Rasa Premium</h5>
                    <p>Perpaduan sempurna antara tekstur, aroma, dan cita rasa yang tak tertandingi.</p>
                </div>
                <img src="{{ asset('images/landingpage/keunggulan4.png') }}" alt="Rasa Premium" width="80">
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page/tentangkami.css') }}">
@endsection