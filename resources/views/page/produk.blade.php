@extends('layouts.layout')

@section('landingpage')

<div class="container btn-back mt-3">
    <a href="{{ route('kategoriproduk.index') }}" class="text-dark fw-bold d-flex align-items-center">
        <i class="fas fa-arrow-left me-2"></i> Kembali
    </a>
</div>

<div class="container produk-container py-4">
    <h1 class="text-center mb-4">Produk</h1>

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
            </select>
        </div>
    </div>

    <div class="row justify-content-start" id="produk-container">
        @foreach ($produk as $produk)
            <div class="col-md-3 mb-4 d-flex justify-content-center produk-item">
                <div class="card card-produk rounded-3" style="width: 300px;">
                    <a href="{{ route('produk.detail', ['id_produk' => $produk->id_produk, 'kategori' => request('kategori')]) }}">
                        <img src="{{ asset('storage/' . $produk->gambar_produk) }}" class="img-fluid mx-auto d-block rounded-top-3" 
                             style="max-width: 300px; height: 200px;" alt="{{ $produk->nama_produk }}">
                    </a>                    
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $produk->nama_produk }}</h5>
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
    document.getElementById("search").addEventListener("keyup", function() {
        let searchValue = this.value.toLowerCase();
        document.querySelectorAll(".produk-item").forEach(function(item) {
            let productName = item.querySelector(".card-title").textContent.toLowerCase();
            item.style.display = productName.includes(searchValue) ? "block" : "none";
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

            if (sortValue === "harga_asc") return hargaA - hargaB;
            if (sortValue === "harga_desc") return hargaB - hargaA;
            if (sortValue === "nama_asc") return namaA.localeCompare(namaB);
            if (sortValue === "nama_desc") return namaB.localeCompare(namaA);
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
