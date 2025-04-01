@extends('layouts.layout')

@section('landingpage')
<div class="container">
    <h2>Wishlist Anda</h2>
    <div class="row">
        @foreach($wishlistItems as $wishlistItem)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 rounded">
                <img src="{{ asset('storage/' . $wishlistItem->produk->gambar_produk) }}" class="card-img-top" alt="{{ $wishlistItem->produk->nama_produk }}">
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
</div>
@endsection
