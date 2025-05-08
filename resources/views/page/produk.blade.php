@extends('layouts.layout')

@section('landingpage')

<div class="container" style="margin-top: 150px;">
    <div class="row align-items-center">
        <div class="col-2 d-flex justify-content-start">
            <a href="{{ route('kategoriproduk.index') }}" class="text-dark fw-bold d-flex align-items-center btn-back">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <div class="col-8 text-center">
            <h1 class="fw-bold m-0">Produk</h1>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<div class="container produk-container py-4">
    <!-- Search dan Dropdown Urutkan -->
    <div class="row mb-4 justify-content-center">
        <div class="col-md-4">
            <input type="text" id="search" class="form-control" placeholder="Cari produk...">
        </div>
        <div class="col-md-4">
            <select id="sort" class="form-control">
                <option value="">Urutkan</option>
                <option value="harga_asc">Harga Termurah</option>
                <option value="harga_desc">Harga Termahal</option>
                <option value="nama_asc">Nama A-Z</option>
                <option value="nama_desc">Nama Z-A</option>
                <option value="best_seller">Best Seller</option>
            </select>
        </div>
    </div>

    <div class="row justify-content-start" id="produk-container">
        @foreach ($produk as $produk)
            <div class="col-md-3 mb-4 d-flex justify-content-center produk-item">
                <div class="card card-produk rounded-3 position-relative" style="width: 300px;">
                    <a href="{{ route('produk.detail', ['id_produk' => $produk->id_produk, 'kategori' => request('kategori')]) }}">
                        <img src="{{ asset('storage/' . $produk->gambar_produk) }}" class="img-fluid mx-auto d-block rounded-top-3" 
                             style="max-width: 300px; height: 200px;" alt="{{ $produk->nama_produk }}">
                        @if ($produk->best_seller === 'ya')
                            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">Best Seller</span>
                        @endif
                    </a>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $produk->nama_produk }}</h5>
                        <p class="card-text produk-deskripsi">
                            {{ $produk->deskripsi }}
                        </p>
                        <p class="card-text fw-bold harga">
                            Rp {{ number_format((int) str_replace(['.', ','], '', $produk->harga), 0, ',', '.') }}
                        </p>                    
                        <p class="card-text text-end fw-bold ukuran">{{ $produk->ukuran }}</p>
                        <p class="card-text text-center fw-bold kategori">{{ $produk->kategori->nama_kategori ?? 'Tidak ada' }}</p>
                    </div>                    
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.getElementById("search").addEventListener("keyup", function () {
        let searchValue = this.value.toLowerCase();
        document.querySelectorAll(".produk-item").forEach(function (item) {
            let productName = item.querySelector(".card-title").textContent.toLowerCase();
            if (productName.includes(searchValue)) {
                item.classList.remove("d-none");
                item.classList.add("d-flex");
            } else {
                item.classList.add("d-none");
                item.classList.remove("d-flex");
            }
        });
    });

    document.getElementById("sort").addEventListener("change", function() {
        let sortValue = this.value;
        let produkContainer = document.getElementById("produk-container");
        let produkItems = Array.from(produkContainer.children);

        produkItems.sort((a, b) => {
        let hargaA = parseFloat(a.querySelector(".harga").textContent.replace(/[^\d]/g, ""));
        let hargaB = parseFloat(b.querySelector(".harga").textContent.replace(/[^\d]/g, ""));
        let namaA = a.querySelector(".card-title").textContent.toLowerCase();
        let namaB = b.querySelector(".card-title").textContent.toLowerCase();

        let isBestSellerA = a.querySelector(".badge") !== null; // Ada badge Best Seller?
        let isBestSellerB = b.querySelector(".badge") !== null;

        if (sortValue === "harga_asc") return hargaA - hargaB;
        if (sortValue === "harga_desc") return hargaB - hargaA;
        if (sortValue === "nama_asc") return namaA.localeCompare(namaB);
        if (sortValue === "nama_desc") return namaB.localeCompare(namaA);
        if (sortValue === "best_seller") {
            // Best seller tampil di atas
            if (isBestSellerA && !isBestSellerB) return -1;
            if (!isBestSellerA && isBestSellerB) return 1;
            return 0; // Kalau dua-duanya sama (dua-duanya best seller atau bukan), urutan tetap
        }
        return 0;
    });


        produkContainer.innerHTML = "";
        produkItems.forEach(item => produkContainer.appendChild(item));
    });
</script>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page/produk.css') }}">
@endsection
