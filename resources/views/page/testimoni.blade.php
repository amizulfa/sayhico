@extends('layouts.layout')

@section('landingpage') 
<div class="container mt-5">
    <h1 class="title-h1 text-center mb-4">Testimoni</h1>
    <!-- Filter -->
    <div class="filter-container d-flex gap-2 mb-4 justify-content-center">
        <button class="btn btn-outline-primary filter-btn" data-filter="semua">Semua</button>
        <button class="btn btn-outline-primary filter-btn" data-filter="dengan_foto">Dgn Foto/Video</button>
        
        <select id="ratingFilter" class="btn btn-outline-primary">
            <option value="">Semua Rating</option>
            <option value="5">⭐⭐⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="2">⭐⭐</option>
            <option value="1">⭐</option>
        </select>
        

        @foreach ($kategori as $kat)
            <button class="btn btn-outline-primary filter-btn" data-filter="{{ $kat->nama_kategori }}">
                {{ $kat->nama_kategori }}
            </button>
        @endforeach
    </div>

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
        <p class="text-dark"><strong>Kategori:</strong> {{ $item->kategoriData->nama_kategori ?? 'Tidak Ada' }}</p>
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
    document.addEventListener("DOMContentLoaded", function() {
        const filterButtons = document.querySelectorAll(".filter-btn");
        const ratingFilter = document.getElementById("ratingFilter");
        const testimonialContainer = document.getElementById("testimonial-container");
    
        function applyFilter(filterType, value) {
            let url = new URL(window.location.href);
            url.searchParams.set(filterType, value);
    
            fetch(url, { 
                headers: { 'X-Requested-With': 'XMLHttpRequest' } 
            })
            .then(response => response.json())
            .then(data => {
                testimonialContainer.innerHTML = ""; // Kosongkan isi dulu
    
                data.testimoni.forEach(item => {
                    let ratingHTML = '';
                    for (let i = 0; i < item.rating; i++) {
                        ratingHTML += '<i class="fas fa-star"></i>';
                    }
                    for (let i = item.rating; i < 5; i++) {
                        ratingHTML += '<i class="far fa-star"></i>';
                    }
    
                    let testimoniHTML = `
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div>
                                    <strong class="text-dark">${item.nama_pembeli}</strong>
                                    <div class="rating">${ratingHTML}</div>
                                </div>
                            </div>
                            <p class="text-muted">${item.waktu_pembelian} | Variasi: ${item.variasi}</p>
                            <p class="text-dark"><strong>Kategori:</strong> ${item.kategoriData ? item.kategoriData.nama_kategori : 'Tidak Ada'}</p>
                            <p class="testimonial-text">${item.deskripsi}</p>
                            ${item.gambar_testi ? `<div class="product-images"><img src="/uploads/testimoni/${item.gambar_testi}" alt="Gambar Testimoni"></div>` : ''}
                        </div>
                    `;
    
                    testimonialContainer.innerHTML += testimoniHTML;
                });
            });
        }
    
        filterButtons.forEach(button => {
            button.addEventListener("click", function() {
                applyFilter("kategori", this.getAttribute("data-filter"));
            });
        });
    
        ratingFilter.addEventListener("change", function() {
            applyFilter("rating", this.value);
        });
    });
    </script>    
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page/testimoni.css') }}">
@endsection

