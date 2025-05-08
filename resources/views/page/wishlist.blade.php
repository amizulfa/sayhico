@extends('layouts.layout')
<style>
    @media (max-width: 412px) {
        .card {
            height: auto !important;
            display: flex;
            flex-direction: column;
            align-items: center;
             width: 60%; /* Menyesuaikan lebar card */
            margin: 0 auto; /* Membuat card tetap berada di tengah */
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 10px;
        }

        .card-body h6,
        .card-body p {
            font-size: 14px;
        }

        .card-body .harga,
        .card-body .kategori {
            font-size: 13px;
        }

        .card-body .text-muted {
            font-size: 12px;
        }

        select.form-select {
            font-size: 12px;
        }

        /* Menyesuaikan posisi form filter di tengah */
        .filter-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        /* Menyesuaikan ukuran kontainer pada mobile */
        .container {
            margin-top: 50px;
        }

        .row {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

    .card-body {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    height: 100%;
    padding: 10px;
}

.card-body h6,
.card-body p {
    font-size: 14px;
    margin-bottom: 5px;
}

.card-body .harga,
.card-body .kategori {
    font-size: 13px;
}

.card-body .text-muted {
    font-size: 12px;
    margin-top: auto; /* Dorong ke bawah */
}

    </style>
    
@section('landingpage')
<div class="container">
    <h1 class="fw-bold mb-4 text-center" style="margin-top: 150px;">Wishlist Anda</h1>

    @if($wishlistItems->isEmpty())
        <div class="text-center py-5">
            <i class="fa-regular fa-heart fa-5x mb-3 text-secondary"></i>
            <h5 class="text-muted">Anda belum mempunyai produk yang disimpan.</h5>
            <a href="{{ route('produk.index') }}" class="btn btn-primary mt-3">Lihat Produk</a>
        </div>
    @else
        <div class="row">
            <form method="GET" action="{{ route('wishlist.index') }}" class="mb-4 text-start">
                <label for="sort" class="me-2 fw-bold">Urutkan:</label>
                <select name="sort" id="sort" onchange="this.form.submit()" class="form-select d-inline w-auto">
                    <option value="">Pilih</option>
                    <option value="harga_terendah" {{ request('sort') == 'harga_terendah' ? 'selected' : '' }}>Harga Terendah</option>
                    <option value="harga_tertinggi" {{ request('sort') == 'harga_tertinggi' ? 'selected' : '' }}>Harga Tertinggi</option>
                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Disimpan Terbaru</option>
                    <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Disimpan Terlama</option>
                </select>
            </form>
            
            @foreach($wishlistItems as $wishlistItem)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card shadow-sm border-1 rounded" style="height: 100%">
                    <img src="{{ asset('storage/' . $wishlistItem->produk->gambar_produk) }}" style="max-width: 300px; height: 200px; object-fit:cover;" class="card-img-top" alt="{{ $wishlistItem->produk->nama_produk }}">
                    <div class="card-body d-flex flex-column">
                        <h6 class="fw-bold text-dark">{{ $wishlistItem->produk->nama_produk }}</h6>
                        <p class="fw-bold harga">Rp {{ number_format((int) str_replace(['.', ','], '', $wishlistItem->produk->harga), 0, ',', '.') }}</p>
                        <p class="card-text kategori text-center">{{ $wishlistItem->produk->kategori->nama_kategori ?? 'Tidak ada' }}</p>
                    
                        <a href="{{ route('produk.detail', ['id_produk' => $wishlistItem->produk->id_produk]) }}" class="stretched-link"></a>
                        
                        <p class="text-muted small mt-auto">
                            Disimpan pada: {{ \Carbon\Carbon::parse($wishlistItem->tanggal_simpan)->format('d M Y') }}
                        </p>
                    </div>                    
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
