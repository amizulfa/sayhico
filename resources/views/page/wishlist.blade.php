@extends('layouts.layout')
<style>
    @media (max-width: 412px) {
    .card {
        height: auto !important;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-body h6,
    .card-body p {
        font-size: 14px;
    }
}

</style>
@section('landingpage')
<div class="container">
    <h1 class="fw-bold mb-4 mt-4 text-center">Wishlist Anda</h1>

    @if($wishlistItems->isEmpty())
        <div class="text-center py-5">
            <i class="fa-regular fa-heart fa-5x mb-3 text-secondary"></i>
            <h5 class="text-muted">Anda belum mempunyai produk yang disimpan.</h5>
            <a href="{{ route('produk.index') }}" class="btn btn-primary mt-3">Lihat Produk</a>
        </div>
    @else
        <div class="row">
            @foreach($wishlistItems as $wishlistItem)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card shadow-sm border-1 rounded" style="height: 350px">
                    <img src="{{ asset('storage/' . $wishlistItem->produk->gambar_produk) }}" style="max-width: 300px; height: 200px;" class="card-img-top" alt="{{ $wishlistItem->produk->nama_produk }}">
                    <div class="card-body">
                        <h6 class="fw-bold text-dark">{{ $wishlistItem->produk->nama_produk }}</h6>
                        <p class="fw-bold harga">Rp {{ number_format((int) str_replace(['.', ','], '', $wishlistItem->produk->harga), 0, ',', '.') }}</p>
                        <p class="card-text text-center kategori">{{ $wishlistItem->produk->kategori->nama_kategori ?? 'Tidak ada' }}</p>
                        <a href="{{ route('produk.detail', ['id_produk' => $wishlistItem->produk->id_produk]) }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
