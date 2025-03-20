@extends('layouts.layout')

@section('landingpage') 
<style>
    .contact-map {
    width: 100%;
    height: 300px;
    overflow: hidden;
    }

    .contact-card {
        background: white;
        border-style: solid;
        border-color: rgb(240, 240, 240);
        border-radius: 15px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 150px;
    }

    .contact-card i {
        font-size: 30px;
        color: #f4a47d;
        margin-bottom: 10px;
    }

    .contact-form-section {
        max-width: 800px;
        margin: auto;
        padding: 40px;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    .contact-form h2 {
        font-weight: bold;
        color: black;
    }
    
    .contact-form h2 span {
        color: #f4a47d;
    }
    
    .contact-form p {
        font-size: 14px;
        color: #666;
    }

    .form-control {
        border-radius: 5px;
        height: 45px;
    }

    textarea.form-control {
        height: 120px;
        resize: none;
    }

    .btn-submit {
        background-color: #f4a47d;
        color: white;
        font-weight: bold;
        padding: 12px;
        border-radius: 5px;
        width: 100%;
        border: none;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #e8936c;
    }
</style>

<div class="container mt-5">
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

            <form  method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="first_name" placeholder="Nama Depan" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control mb-3" name="last_name" placeholder="Nama Belakang">
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
