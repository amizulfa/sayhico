@extends('layouts.layout')

@section('landingpage')
<div class="container mt-5">
    <h1 class="title-h1 text-center mb-4">Testimoni</h1>

    <!-- Filter -->
    <div class="filter-container d-flex gap-2 mb-4 justify-content-center">
        <!-- Filter Foto -->
        <select id="fotoFilter" class="btn btn-outline-primary">
            <option value="">Semua Testimoni</option>
            <option value="dengan_foto">Dgn Foto/Video</option>
        </select>

        <!-- Filter Kategori -->
        <select id="kategoriFilter" class="btn btn-outline-primary">
            <option value="">Semua Kategori</option>
            @foreach ($kategori as $kat)
                <option value="{{ $kat->nama_kategori }}">{{ $kat->nama_kategori }}</option>
            @endforeach
        </select>

        <!-- Filter Rating -->
        <select id="ratingFilter" class="btn btn-outline-primary">
            <option value="">Semua Rating</option>
            <option value="5">⭐⭐⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="2">⭐⭐</option>
            <option value="1">⭐</option>
        </select>
    </div>


    <!-- Testimoni -->
    <div class="testimonial-container" id="testimonial-container">
        @foreach ($testimoni as $item)
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div>
                        <strong class="text-dark">{{ $item->nama_pembeli }}</strong>
                        <div class="rating">
                            {!! str_repeat('<i class="fas fa-star"></i>', $item->rating) !!}
                            {!! str_repeat('<i class="far fa-star"></i>', 5 - $item->rating) !!}
                        </div>
                    </div>
                </div>
                <p class="text-muted">{{ $item->waktu_pembelian }} | Variasi: {{ $item->variasi }}</p>
                <p class="text-dark"><strong>Kategori:</strong> {{ $item->kategori->nama_kategori ?? 'Tidak Ada' }}</p>
                <p class="testimonial-text">{{ $item->deskripsi }}</p>

                @if ($item->gambar_testi)
                    <div class="product-images">
                        <img src="{{ asset('storage/' . $item->gambar_testi) }}" alt="Gambar Testimoni">
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section">
    <img src="{{ asset('images/testimoni/cta.jpg') }}" alt="Say_Hi Cookies">
    <div class="cta-content">
        <h2>Ciptakan Momen Manis dengan Cookies Berkualitas dari Say_Hi.Co!</h2>
        <p>Rasakan kelezatan cookies homemade dengan bahan terbaik dan cita rasa premium.</p>
        <a href="#" class="btn btn-custom">Pesan Sekarang</a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const kategoriFilter = document.getElementById("kategoriFilter");
        const fotoFilter = document.getElementById("fotoFilter");
        const ratingFilter = document.getElementById("ratingFilter");
        const testimonialContainer = document.getElementById("testimonial-container");
    
        let currentFilters = {
            kategori: '',
            foto: '',
            rating: ''
        };
    
        function updateTestimoni() {
            let url = new URL(window.location.href);
    
            Object.entries(currentFilters).forEach(([key, value]) => {
                if (value) {
                    url.searchParams.set(key, value);
                } else {
                    url.searchParams.delete(key);
                }
            });
    
            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.json())
            .then(data => {
                testimonialContainer.innerHTML = "";
    
                data.testimoni.forEach(item => {
                    let ratingHTML = '';
                    for (let i = 0; i < item.rating; i++) {
                        ratingHTML += '<i class="fas fa-star"></i>';
                    }
                    for (let i = item.rating; i < 5; i++) {
                        ratingHTML += '<i class="far fa-star"></i>';
                    }
    
                    let kategori = item.kategori ? item.kategori.nama_kategori : 'Tidak Ada';
    
                    let testimoniHTML = `
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div>
                                    <strong class="text-dark">${item.nama_pembeli}</strong>
                                    <div class="rating">${ratingHTML}</div>
                                </div>
                            </div>
                            <p class="text-muted">${item.waktu_pembelian} | Variasi: ${item.variasi}</p>
                            <p class="text-dark"><strong>Kategori:</strong> ${kategori}</p>
                            <p class="testimonial-text">${item.deskripsi}</p>
                            ${item.gambar_testi ? `<div class="product-images"><img src="/storage/${item.gambar_testi}" alt="Gambar Testimoni"></div>` : ''}
                        </div>
                    `;
    
                    testimonialContainer.innerHTML += testimoniHTML;
                });
    
                history.replaceState({}, '', url);
            });
        }
    
        kategoriFilter.addEventListener("change", function () {
            currentFilters.kategori = this.value;
            updateTestimoni();
        });
    
        fotoFilter.addEventListener("change", function () {
            currentFilters.foto = this.value;
            updateTestimoni();
        });
    
        ratingFilter.addEventListener("change", function () {
            currentFilters.rating = this.value;
            updateTestimoni();
        });
    });
    </script>
    
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/page/testimoni.css') }}">
@endsection
