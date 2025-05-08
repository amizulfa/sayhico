@extends('layouts.layout')

@section('landingpage') 
<!-- Hero Section -->
<div class="cta-section" style="margin-top: 100px">
    <img src="{{ asset('images/herotk.jpg') }}" alt="Say_Hi Cookies">
    <div class="cta-content">
        <h1 class="fw-bold">T e n t a n g  K a m i</h1>
    </div>
</div>

<!-- Cerita Kami Section -->
<div class="story-section">
    <div class="story-text">
        <p>
            Say_Hi.Co berawal dari kecintaan sederhana terhadap dunia memasak dan membuat kue. Dari dapur kecil di rumah, kami mencoba berbagai resep, bereksperimen dengan rasa, hingga akhirnya menemukan passion untuk berbagi kebahagiaan lewat kue-kue homemade. Dukungan dari keluarga dan teman-teman membuat kami percaya diri untuk menghadirkan produk yang bukan hanya enak, tetapi juga dibuat dengan sepenuh hati. Say_Hi.Co lahir dari semangat itu sehingga menghadirkan rasa hangat dalam setiap gigitan.
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
            Say_Hi.Co adalah brand yang menghadirkan aneka cookies premium homemade, dibuat dari bahan-bahan pilihan dengan rasa yang istimewa. Kami percaya bahwa kue buatan rumah punya kehangatan tersendiri, dan kami ingin membagikannya lewat produk yang tidak hanya enak, tetapi juga berkualitas. Dengan beragam pilihan rasa dan tekstur, Say_Hi.Co menawarkan cookies yang cocok untuk berbagai momen — baik untuk dinikmati sendiri maupun dibagikan kepada orang terdekat
        </p>
        <p>
            Produk kami juga sangat cocok dijadikan hampers Lebaran yang berkesan — pilihan manis, elegan, dan personal untuk menyampaikan kasih sayang di hari yang istimewa. Kami berkomitmen untuk menjadi pilihan utama cookies premium homemade dengan harga yang tetap terjangkau, tanpa mengorbankan kualitas dan cita rasa.
        </p>
    </div>
</div>

<!-- Keunggulan Kami -->
<div class="keunggulan position-relative mb-5">
    <div class="container text-center">
        <h2 class="font-weight-bold" style="color: #c87137">Kenapa Harus Say_Hi.Co?</h2>
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

<!-- Target Market Section -->
<div class="target-market-section container my-5">
    <h2 class="text-center fw-bold mb-5" style="color: #c87137; font-size:28px;">Say_Hi.Co cocok untuk..</h2>

    <!-- Baris pertama: 3 kolom -->
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="target-card h-100 p-4 text-center">
                <img src="{{ asset('images/target/mom.png') }}" alt="Ibu rumah tangga" class="mb-3" width="60">
                <p>Ibu rumah tangga yang ingin suguhan sehat dan lezat untuk keluarga tercinta</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="target-card h-100 p-4 text-center">
                <img src="{{ asset('images/target/work.png') }}" alt="Profesional muda" class="mb-3" width="60">
                <p>Pekerja muda yang butuh camilan manis sebagai teman fokus dan semangat kerja</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="target-card h-100 p-4 text-center">
                <img src="{{ asset('images/target/college.png') }}" alt="Mahasiswa" class="mb-3" width="60">
                <p>Mahasiswa aktif yang ingin ngemil tanpa rasa bersalah di sela kesibukan</p>
            </div>
        </div>
    </div>

    <!-- Baris kedua: 2 kolom di tengah -->
    <div class="row g-4 justify-content-center mt-1">
        <div class="col-md-6 col-lg-5">
            <div class="target-card h-100 p-4 text-center">
                <img src="{{ asset('images/target/gift.png') }}" alt="Kado unik" class="mb-3" width="60">
                <p>Kamu yang sedang cari kado atau hampers spesial, manis, dan tak terlupakan</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-5">
            <div class="target-card h-100 p-4 text-center">
                <img src="{{ asset('images/target/cookies.png') }}" alt="Cookies premium" class="mb-3" width="60">
                <p>Siapa saja yang ingin menikmati cookies premium tanpa harus keluar budget besar</p>
            </div>
        </div>
    </div>
</div>



@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page/tentangkami.css') }}">
@endsection