@extends(session('is_admin') ? 'page.admin.layout' : 'layout')


@section('title', 'Dashboard')

@section('content')

<style>
    .card-total {
        border-radius: 10px;
        width: 50px;
        height: 50px;
        align-content: center;
    }
    .card-total-kategori { background-color: #2B55B1; } 
    .card-total-produk { background-color: #28A745; } 
    .card-total-testimoni { background-color: #FFC107; } 
    .card-total-portfolio { background-color: #DC3545; }
    .card-total-wishlist { background-color: #d73ab8; }
</style>

<div class="container mt-4">
    <h3 class="mb-3">Dashboard</h3>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card shadow-sm p-4 align-items-center text-center">
                <h5 class="text-muted pb-3">Kategori Produk</h5>
                <div class="card-total card-total-kategori text-white">
                    <h4 class="mb-0">{{ $totalKategori }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-4 align-items-center text-center">
                <h5 class="text-muted pb-3">Produk</h5>
                <div class="card-total card-total-produk text-white">
                    <h4 class="mb-0">{{ $totalProduk }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-4 align-items-center text-center">
                <h5 class="text-muted pb-3">Testimoni</h5>
                <div class="card-total card-total-testimoni text-white">
                    <h4 class="mb-0">{{ $totalTestimoni }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-4 align-items-center text-center">
                <h5 class="text-muted pb-3">Portfolio</h5>
                <div class="card-total card-total-portfolio text-white">
                    <h4 class="mb-0">{{ $totalPortfolio }}</h4>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mt-4">
            <div class="card shadow-sm p-4 align-items-center text-center">
                <h5 class="text-muted pb-3">Produk Disimpan User</h5>
                <div class="card-total card-total-wishlist text-white d-flex justify-content-center align-items-center">
                    <h4 class="mb-0">{{ $totalWishlist }}</h4>
                </div>
                @if($produkFavorit && $produkFavorit->produk)
                <div class="mt-3">
                    <small class="text-muted">Paling banyak disimpan:</small><br>
                    <strong>{{ $produkFavorit->produk->nama_produk }}: {{ $produkFavorit->produk->ukuran ?? '-' }}</strong>
                    <small class="text-muted">Jumlah: {{ $produkFavorit->total_disimpan }}</small><br>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
