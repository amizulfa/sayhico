@extends('layouts.layout')

@section('landingpage') 
<style>
    .testimonial-card {
        border-radius: 10px;
        background: white;
        padding: 20px;
        text-align: left; 
        border-style: solid;
        border-color: rgb(240, 240, 240)
    }
    .testimonial-header {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .testimonial-header img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
    .rating {
        color: #fdd835;
    }
    .testimonial-text {
        margin-top: 10px;
        font-size: 14px;
        color: #333;
    }
    .product-images {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }
    .product-images img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }

    .cta-section {
        position: relative;
        margin-top: 50px;
    }

    .cta-section img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .cta-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(234, 187, 95, 0.4); /* Layer transparan */
    }

    .cta-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        font-weight: bold;
        max-width: 80%;
        z-index: 2;
    }

    .cta-content h2 {
        font-weight: bold;
    }

    .cta-content p {
        font-weight: normal;
    }

    .cta-content .btn {
        font-weight: bold;
        padding: 10px 20px;
    }

    .btn-custom {
        background-color: var(--accent-color);
        color: white;
        font-weight: bold;
    }

</style>

<div class="container mt-5">
    <h1 class="title-h1 text-center mb-4">Testimoni</h1>

    <div class="row justify-content-center">
        <!-- Testimoni 1 -->
        <div class="col-md-4 mb-4">
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="https://placehold.co/50x50" alt="User Photo">
                    <div>
                        <strong class="text-dark">Floyd Miles</strong>
                        <div class="rating">★★★★★</div>
                    </div>
                </div>
                <p class="text-muted">06-06-2016 | 20:16</p>
                <p class="text-dark"><strong >Varian:</strong> Nama Varian</p>
                <p class="testimonial-text"><strong>Deskripsi:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                <!-- Gambar Produk -->
                <div class="product-images">
                    <img src="https://placehold.co/100x100" alt="Product Testimonial 1">
                    <img src="https://placehold.co/100x100" alt="Product Testimonial 2">
                </div>
            </div>
        </div>

        <!-- Testimoni 2 -->
        <div class="col-md-4 mb-4">
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="https://placehold.co/50x50" alt="User Photo">
                    <div>
                        <strong>Floyd Miles</strong>
                        <div class="rating">★★★★★</div>
                    </div>
                </div>
                <p class="text-muted">06-06-2016 | 20:16</p>
                <p><strong>Varian:</strong> Nama Varian</p>
                <p class="testimonial-text"><strong>Deskripsi:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                <!-- Gambar Produk -->
                <div class="product-images">
                    <img src="https://placehold.co/100x100" alt="Product Testimonial 1">
                    <img src="https://placehold.co/100x100" alt="Product Testimonial 2">
                </div>
            </div>
        </div>

        <!-- Testimoni 3 -->
        <div class="col-md-4 mb-4">
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="https://placehold.co/50x50" alt="User Photo">
                    <div>
                        <strong>Floyd Miles</strong>
                        <div class="rating">★★★★★</div>
                    </div>
                </div>
                <p class="text-muted">06-06-2016 | 20:16</p>
                <p><strong>Varian:</strong> Nama Varian</p>
                <p class="testimonial-text"><strong>Deskripsi:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                <!-- Gambar Produk -->
                <div class="product-images">
                    <img src="https://placehold.co/100x100" alt="Product Testimonial 1">
                    <img src="https://placehold.co/100x100" alt="Product Testimonial 2">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cta-section">
    <img src="{{ asset('images/testimoni/cta.jpg') }}" alt="Say_Hi Cookies">
    <div class="cta-content">
        <h2>Ciptakan Momen Manis dengan Cookies Berkualitas dari Say_Hi.Co!</h2>
        <p>Rasakan kelezatan cookies homemade dengan bahan terbaik dan cita rasa premium.</p>
        <a href="#" class="btn btn-custom">Pesan Sekarang</a>
    </div>
</div>



@endsection
