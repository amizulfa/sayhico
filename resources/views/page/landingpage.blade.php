<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homemade Cookies</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <style>
    </style>
    
</head>
<body>
    <div class="hero-section">
        <img src="{{ asset('images/hero.jpg') }}" alt="A box of homemade cookies with cloves and cinnamon sticks around it">
        <div class="hero-overlay">
            <h1>Homemade Cookies With Premium Taste</h1>
            <p>Satu gigitan tidak akan cukup, rasakan kenikmatan dan kelezatan cookies homemade berkualitas tinggi yang membuatmu ingin lagi dan lagi!</p>
            <div>
                <a href="#" class="btn btn1">Pesan Sekarang</a>
                <a href="#" class="btn btn2">Lihat Produk</a>
            </div>
        </div>
    </div>
    
    <section class="container my-5">
        <h2 class="section-title">Apa Saja Produk Say_Hi.Co?</h2>
        <p class="section-subtitle">
            Nikmati berbagai pilihan cookies homemade dengan bahan premium, cita rasa yang tak terlupakan dengan harga yang terjangkau.
        </p>

        <div class="product-container my-5">
            <div class="product-card">
                <img src="{{ asset('images/landingpage/2.jpg') }}" alt="Cookies 1">
            </div>
            <div class="product-card">
                <img src="{{ asset('images/landingpage/3.jpg') }}" alt="Cookies 2">
            </div>
            <div class="product-card">
                <img src="{{ asset('images/landingpage/4.jpg') }}" alt="Cookies 3">
            </div>
            <div class="product-card">
                <img src="{{ asset('images/landingpage/1.jpg') }}" alt="Cookies 4">
            </div>
        </div>

        <div class="button-container">
            <a class="btn btn-custom" href="{{ route('kategoriproduk.index') }}">Lihat Produk</a>
        </div>
    </section>

    <section class="testimoni">
        <div class="container">
            <h2 class="text-center text-black">Apa Kata Mereka Tentang Say_Hi.Co?</h2>
            <p class="text-black text-center mb-5">
                Kami percaya bahwa kepuasan pelanggan adalah yang utama! Tidak hanya sekadar cookies, kami menghadirkan pengalaman rasa yang istimewa di setiap gigitan. Simak apa yang pelanggan kami katakan tentang kelezatan dan kualitas produk Say_Hi.Co.
            </p>
    
            <!-- Swiper Container -->
            <div class="swiper-container testimoni-swiper">
                <div class="swiper-wrapper">
                    @foreach ($testimoni as $testi)
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="d-flex mb-2">
                                    <div class="ms-3">
                                        <strong>{{ $testi->nama_pembeli }}</strong>
                                        <div class="stars">
                                            {{ str_repeat('★', $testi->rating) }}{{ str_repeat('☆', 5 - $testi->rating) }}
                                        </div>
                                    </div>
                                </div>
                                <p class="date-time"><small>{{ date('d-m-Y', strtotime($testi->waktu_pembelian)) }}</small></p>
                                <p class="variant"><strong>Varian:</strong> {{ $testi->variasi}}</p>
                                <p class="description">{{ $testi->deskripsi }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
    
                <!-- Pagination (Dots) -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    
    
    

    <section class="keunggulan position-relative mb-5">
        <!-- Background Text -->
        <div class="background-text premium">Premium</div>
        <div class="background-text cookies">Cookies</div>
    
        <div class="container text-center py-5">
            <h2 class="font-weight-bold">Kenapa Harus Say_Hi.Co?</h2>
            <p>Di Say_Hi.Co, kami menghadirkan cookies premium dengan cita rasa istimewa yang dibuat dari bahan berkualitas terbaik. Kami berkomitmen untuk memberikan pengalaman manis yang tak terlupakan dalam setiap gigitan.</p>
        </div>
    
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5 d-flex align-items-center gap-3 mb-4 px-lg-5 px-md-4">
                    <img src="{{ asset('images/landingpage/keunggulan1.png') }}" alt="Homemade" width="80">
                    <div class="text-md-start text-left">
                        <h5 class="fw-bold">Homemade & Fresh</h5>
                        <p>Dibuat dengan cinta, selalu fresh di setiap pesanan.</p>
                    </div>
                </div>
                <div class="col-md-5 d-flex align-items-center gap-3 mb-4 px-lg-5 px-md-4">
                    <div class="text-md-end text-right">
                        <h5 class="fw-bold">Bahan Berkualitas</h5>
                        <p>Menggunakan bahan pilihan terbaik untuk rasa yang lebih istimewa.</p>
                    </div>
                    <img src="{{ asset('images/landingpage/keunggulan3.png') }}" alt="Bahan Berkualitas" width="80">
                </div>
                <div class="col-md-5 d-flex align-items-center gap-3 mb-4 px-lg-5 px-md-4">
                    <img src="{{ asset('images/landingpage/keunggulan2.png') }}" alt="Harga Terjangkau" width="80">
                    <div class="text-md-start text-left">
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
    </section>

    <section class="portfolio" id="portfolio">
        <div class="container">
            <h2 class="text-center">Kreasi Manis dari Say_Hi.Co</h2>
            <p class=" section-subtitle text-center mb-5">
                Jelajahi portofolio kami dan temukan kelezatan yang telah dipercaya oleh banyak pelanggan. Siap untuk menciptakan momen manis bersama Say_Hi.Co?💛
            </p>
    
            <!-- Swiper Container -->
            <div class="swiper-container portfolio-swiper">
                <div class="swiper-wrapper">
                    <!-- Portfolio Item 1 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port1.jpg') }}" alt="Portfolio 1">
                    </div>
    
                    <!-- Portfolio Item 2 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port2.jpg') }}" alt="Portfolio 2">
                    </div>
    
                    <!-- Portfolio Item 3 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port3.jpg') }}" alt="Portfolio 3">
                    </div>
    
                    <!-- Portfolio Item 4 -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port4.jpg') }}" alt="Portfolio 4">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port5.jpg') }}" alt="Portfolio 5">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port6.jpg') }}" alt="Portfolio 6">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port7.jpg') }}" alt="Portfolio 7">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port8.jpg') }}" alt="Portfolio 8">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/landingpage/port9.jpg') }}" alt="Portfolio 9">
                    </div>
                </div>
    
                <!-- Pagination Dots -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    
    <section class="cta-section-card text-center py-5 position-relative">
        <img src="{{ asset('images/landingpage/cookies.png') }}" class="floating-img-card" alt="Cookies Floating">
        <div class="container">
            <h2 class="section-title-cta-card fw-bold mb-3">Hubungi Kami Untuk Memesan</h2>
    
            <!-- Bagian Kontak -->
            <div class="contact-info-card d-flex justify-content-center align-items-center pt-5 gap-5">
                <div class="contact-item-card d-flex align-items-center gap-2">
                    <i class="fa-brands fa-whatsapp fa-beat custom-icon-card mr-3"></i>
                    <span class="contact-text-card">+62 81295923115</span>
                </div>
                <div class="contact-item-card d-flex align-items-center gap-2">
                    <i class="fa-brands fa-instagram fa-beat custom-icon-card mr-3"></i>
                    <span class="contact-text-card">Say_Hi.Co</span>
                </div>
            </div>
    
            <!-- Teks CTA -->
            <p class="cta-text-card mt-3">Cookies istimewa untuk Setiap Kesempatan – Pilih, Pesan, Nikmati!</p>

            <!-- Bagian Produk dalam 1 Card -->
            <hr>
            <h2 class="product-title-card mb-3">Produk Rekomendasi...</h2>
            <div class="recommended-card d-flex justify-content-center">
                <div class="product-card-card p-4">
                    <div class="product-images-card">
                        <h2>Cookies</h2>
                        <img src="{{ asset('images/landingpage/p1.jpg') }}" alt="Nastar Lumer" class="product-img-card">
                        <img src="{{ asset('images/landingpage/p2.jpg') }}" alt="Lidah Kucing" class="product-img-card">
                        <img src="{{ asset('images/landingpage/p3.jpg') }}" alt="Putri Salju Keju" class="product-img-card">
                        <img src="{{ asset('images/landingpage/p4.jpg') }}" alt="Dancow" class="product-img-card">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
    
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var portfolioSwiper = new Swiper('.portfolio-swiper', {
            slidesPerView: 3, /* Menampilkan 3 item */
            spaceBetween: 20, /* Jarak antar slide */
            loop: false, /* Infinite scroll */
            pagination: {
                el: '.swiper-pagination',
                clickable: true, /* Bisa diklik */
            },
            autoplay: {
                delay: 3000, /* Slide otomatis setiap 3 detik */
                disableOnInteraction: false, /* Tetap auto-slide setelah interaksi */
            },
            breakpoints: {
                992: { slidesPerView: 3 }, /* 3 item di layar besar */
                768: { slidesPerView: 2 }, /* 2 item di tablet */
                576: { slidesPerView: 1 }  /* 1 item di HP */
            }
        });
    </script>
    
     
    <script>
        var testimoniSwiper = new Swiper('.testimoni-swiper', {
            slidesPerView: 3, /* Tampilkan 3 testimoni dalam satu tampilan */
            spaceBetween: 20, /* Jarak antar testimoni */
            loop: false, /* Infinite scroll */
            pagination: {
                el: '.swiper-pagination',
                clickable: true, /* Bisa diklik */
            },
            autoplay: {
                delay: 3000, /* Ganti slide otomatis setiap 3 detik */
                disableOnInteraction: false, /* Tetap auto-slide setelah interaksi */
            },
            breakpoints: {
                992: { slidesPerView: 3 }, /* 3 testimoni di layar besar */
                768: { slidesPerView: 2 }, /* 2 testimoni di tablet */
                576: { slidesPerView: 1 }  /* 1 testimoni di HP */
            }
        });
    </script>
    
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
