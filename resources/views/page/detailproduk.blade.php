@extends('layouts.layout')  

@section('landingpage') 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container btn-back mt-3">     
    <div class="container btn-back mt-3">         
        <a href="{{ route('produk.index', ['kategori' => request('kategori')]) }}" 
           class="text-dark fw-bold d-flex align-items-center" style="text-decoration: none;">             
            <i class="fas fa-arrow-left me-2"></i> Kembali         
        </a>     
    </div>     
</div> 

<div class="container">     
    <div class="detail-section container text-center">         
        <h1 class="font-weight-bold text-center title-h1">             
            Detail Produk         
        </h1>     
    </div> 
</div> 

<div class="container detail-container py-5">     
    <div class="row">         
        <!-- Gambar Produk -->         
        <div class="col-md-6 img-container">             
            <img id="mainImage" src="{{ asset('storage/' .$produk->gambar_produk) }}" class="img-detail" alt="{{ $produk->nama_produk }}">
            <div class="d-flex mt-3">                 
                <!-- Thumbnail Gambar Lain -->                 
                @if ($produk->gambar_produk2)
                    <img src="{{ asset('storage/' .$produk->gambar_produk2) }}" 
                        class="img-thumbnail mx-1 thumbnail-img" 
                        style="width: 80px;" 
                        data-src="{{ asset('storage/' .$produk->gambar_produk2) }}">
                @endif

                @if ($produk->gambar_produk3)
                    <img src="{{ asset('storage/' .$produk->gambar_produk3) }}" 
                        class="img-thumbnail mx-1 thumbnail-img" 
                        style="width: 80px;" 
                        data-src="{{ asset('storage/' .$produk->gambar_produk3) }}">
                @endif

            </div>         
        </div>          

        <div class="col-md-6 produk-container px-4">
            <h2 class="fw-bold text-dark">{{ $produk->nama_produk }}</h2>
            <h3 class="fw-bold">Rp {{ number_format((int) str_replace(['.', ','], '', $produk->harga), 0, ',', '.') }}</h3>
            <p class="text-dark"><strong>Ukuran:</strong> {{ $produk->ukuran }}</p>
            <p class="text-dark deskripsi-produk">{{ $produk->deskripsi }}</p>

            @auth
                <!-- Jika sudah login -->
                <button 
                    class="btn {{ $sudahDisimpan ? 'btn-danger' : 'btn-outline-danger' }}" 
                    id="wishlist-btn" 
                    data-produk-id="{{ $produk->id_produk }}"
                    data-saved="{{ $sudahDisimpan ? 'true' : 'false' }}">
                    <i class="fa-solid fa-heart"></i> 
                    {{ $sudahDisimpan ? 'Hapus dari Wishlist' : 'Simpan Produk' }}
                </button>
            @else
                <!-- Jika belum login -->
                <button 
                    class="btn btn-outline-danger" 
                    onclick="showLoginAlert()">
                    <i class="fa-solid fa-heart"></i> Simpan Produk
                </button>
            @endauth


            <!-- Tombol Pesan Sekarang -->
            <a 
                href="https://wa.me/6281295923115?text=Halo%20Say%20Hi.Co!%20Saya%20ingin%20memesan%20produk%20{{ urlencode($produk->nama_produk) }}%20yang%20berukuran%20{{ urlencode($produk->ukuran) }}." 
                target="_blank" 
                class="btn btn-success mt-3"
                >
                <i class="fa-brands fa-whatsapp me-1"></i> Pesan Sekarang
            </a>



            <div class="produk-bottom">
                <!-- Garis pemisah -->
                <hr class="divider mt-3">
        
                <!-- Share -->
                <div class="share-container">
                    <p class="text-dark"><strong>Share:</strong></p>
                    <a href="#" class="iconshare fs-4 mx-1"><i class="fa-brands fa-square-whatsapp"></i></a>
                    <a href="#" class="iconshare fs-4 mx-1"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="#" class="iconshare fs-4 mx-1"><i class="fa-brands fa-square-x-twitter"></i></a>
                </div>
            </div>
        </div>
            
    </div> 
</div>  

<hr class="ms-5 me-5">
<!-- Produk Lainnya -->
@if($produkLainnya->isNotEmpty())
    <div class="container mt-5">
        <h3 class="fw-bold text-center mb-5">Produk Lainnya</h3>
        <div class="row justify-content-center">
            @foreach ($produkLainnya as $produkItem)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card  h-100 d-flex flex-column">
                        <img src="{{ asset('storage/' . $produkItem->gambar_produk) }}" class="card-img-top" alt="{{ $produkItem->nama_produk }}">
                        <div class="card-body ">
                            <h6 class="fw-bold text-dark">{{ $produkItem->nama_produk }}</h6>
                            <p class=" fw-bold harga">Rp {{ number_format((int) str_replace(['.', ','], '', $produkItem->harga), 0, ',', '.') }}</p>
                            <p class="card-text text-end ukuran">{{ $produk->ukuran }}</p>
                            <p class="card-text text-center kategori mt-auto">{{ $produk->kategori->nama_kategori ?? 'Tidak ada' }}</p>
                            <a href="{{ route('produk.detail', ['id_produk' => $produkItem->id_produk]) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

<!-- CTA Section -->
<div class="container-fluid cta-container  py-5 rounded">
    <div class="row align-items-center px-5"> 
        <div class="col-md-6">
            <h2 class="fw-bold text-dark">
                Hadirkan kebahagiaan di setiap gigitan dengan cookies berkualitas dari 
                <span class="brand-name">Say _Hi.Co</span>. Lezat, fresh, dan selalu spesial untukmu! 🍪✨
            </h2>
            <div class="cta-buttons mt-4">
                <a href="https://wa.me/628123456789" class="btn btn-primary cta-btn me-2 hub">Hubungi Kami</a>
                <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary cta-btn lihat">Lihat Produk</a>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/produk/cta.jpg') }}" class="cta-image img-fluid rounded" alt="Produk Say Hi.Co">
        </div>
    </div>
</div>

<script>
    document.getElementById('wishlist-btn').addEventListener('click', function () {
        let produkId = this.getAttribute('data-produk-id');
        let sudahDisimpan = this.getAttribute('data-saved') === 'true';
    
        let url = sudahDisimpan 
            ? "{{ route('wishlist.remove') }}" 
            : "{{ route('wishlist.store') }}";
    
        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            },
            body: JSON.stringify({ id_produk: produkId })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload(); 
        })
        .catch(error => console.error('Error:', error));
    });
    
    function showLoginAlert() {
    Swal.fire({
        title: 'Login Diperlukan',
        text: 'Silakan login terlebih dahulu untuk menyimpan produk.',
        icon: 'warning',
        confirmButtonText: 'Login Sekarang',
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('login') }}";
        }
    });
}
</script>

<script>
    document.querySelectorAll('.thumbnail-img').forEach(function (thumbnail) {
        thumbnail.addEventListener('click', function () {
            const mainImage = document.getElementById('mainImage');

            // Simpan src sekarang
            const currentMainSrc = mainImage.src;
            const newMainSrc = this.src;

            // Tukar src
            mainImage.src = newMainSrc;
            this.src = currentMainSrc;
        });
    });
</script>


@endsection  

@section('styles')     
    <link rel="stylesheet" href="{{ asset('css/page/detailproduk.css') }}"> 
@endsection
