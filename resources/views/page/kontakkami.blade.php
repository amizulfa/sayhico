@extends('layouts.layout')

@section('landingpage') 
<div class="container" style="margin-top: 150px;">
    <div class="contact-section container text-center">
        <h1 class="mb-5 font-weight-bold text-center title-h1 mt-5">
            Kontak Kami
           </h1>
        <!-- Peta -->
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.714784420351!2d106.91348100919768!3d-6.924657493046202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6848264671bd13%3A0xb9fba91015c22e03!2sJl.%20Taman%20Bahagia%20Gg.%20Famili%20No.12a%2C%20Benteng%2C%20Kec.%20Warudoyong%2C%20Kota%20Sukabumi%2C%20Jawa%20Barat%2043132!5e0!3m2!1sid!2sid!4v1742461244110!5m2!1sid!2sid" 
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    
        <!-- Informasi Kontak -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="contact-card">
                    <i class="fa-solid fa-location-dot fa-bounce"></i>
                    <p>Jalan Taman Bahagia Nomor 12 A, Gang Famili RT 01/02, Kelurahan Benteng, Kecamatan Warudoyong, Kota Sukabumi</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-card text-center">
                    <div class="d-flex justify-content-center gap-3">
                        <i class="fa-brands fa-square-whatsapp fa-bounce fa-2x"></i>
                        <i class="fa-solid fa-square-envelope fa-bounce fa-2x"></i>
                    </div>
                    <p>+62 81295923115</p>
                    <p>Say_Hi.Co@gmail.com</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="contact-card">
                    <i class="fa-brands fa-square-instagram fa-bounce"></i>
                    <p>@Say_Hi.Co</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contact-form-section mt-5 mb-5 bg-light">
        <div class="contact-form">
            <h2>HUBUNGI <span>KAMI</span></h2>
            <p>Punya pertanyaan, ingin memesan cookies favoritmu, atau tertarik untuk berkolaborasi? Kami siap menyapa dan bekerja sama denganmu!</p>
            
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        

            <form method="POST" action="{{ route('kontak.kirim') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="firstname" placeholder="Nama Depan" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="lastname" placeholder="Nama Belakang">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="email" class="form-control mb-3" name="email" placeholder="Email *" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="phone" placeholder="No Handphone *" required>
                    </div>
                </div>
                <textarea class="form-control mb-3" name="message" placeholder="Pesan"></textarea>
                <button type="submit" class="btn-submit">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page/kontakkami.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection