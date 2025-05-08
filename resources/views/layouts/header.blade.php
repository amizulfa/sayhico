<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
    /* Ganti warna ikon hamburger menjadi oranye */
    .custom-toggler .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23f57c00' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22' /%3E%3C/svg%3E");
    }

    /* Opsional: hilangkan border default biar lebih clean */
    .custom-toggler {
        border: none;
    }

    .navbar {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        margin: 0 !important;
        line-height: 1;
    }

        /* Container navbar */
        .navbar .container {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        margin: 0 auto;
        align-items: center;
        height: 90px; /* sesuaikan dengan logo */
    }

    /* Umum - kecilkan padding & sesuaikan tampilan */
.navbar {
    padding-top: 0.3rem !important;
    padding-bottom: 0.3rem !important;
}

/* Responsive khusus untuk lebar <= 412px */
@media (max-width: 412px) {
    .navbar-brand img {
        height: 80px; /* tetap besar tapi tidak over */
    }

    .navbar-nav {
        gap: 0.5rem;
        padding-left: 1rem;
    }

    .navbar .btn {
        padding: 0.3rem 0.8rem;
        font-size: 0.9rem;
    }

    .dropdown-menu {
        font-size: 0.9rem;
    }

    .navbar-nav .nav-link {
        font-size: 0.95rem;
    }

    .navbar-toggler {
        padding: 0.25rem 0.5rem;
    }
    
    .navbar-collapse {
        background-color: white;
        padding: 1rem;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
    }

    .navbar-nav .nav-item {
        width: 100%;
        margin-bottom: 0.5rem;
    }

    .navbar-nav .nav-link {
        width: 100%;
        padding: 0.5rem 1rem;
        color: var(--primary-color);
    }

    .navbar .dropdown-menu {
        background-color: white;
        border: 1px solid #ddd;
        width: 100%;
    }

    .dropdown-menu .dropdown-item {
        padding: 0.5rem 1rem;
    }
}


</style>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom border-dark fixed-top">

        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="90">
            </a>

            <!-- Toggle button for mobile -->
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-4">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'fw-bold' : '' }}" 
                           href="{{ url('/') }}" 
                           style="color: var(--primary-color);">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kategoriproduk*') || Request::is('produk*') ? 'fw-bold' : '' }}" 
                        href="{{ route('kategoriproduk.index') }}" 
                        style="color: var(--primary-color);">
                            Produk
                        </a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('caraorder') ? 'fw-bold' : '' }}" 
                           href="{{ url('/caraorder') }}" 
                           style="color: var(--primary-color);">
                            Cara Order
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('testimoni') ? 'fw-bold' : '' }}" 
                           href="{{ url('/testimoni') }}" 
                           style="color: var(--primary-color);">
                            Testimoni
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kontakkami') ? 'fw-bold' : '' }}" 
                           href="{{ url('/kontakkami') }}" 
                           style="color: var(--primary-color);">
                            Kontak Kami
                        </a>
                    </li>
                    <li class="nav-item">
                        @auth
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-xl"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profil.index') }}">
                                        <i class="fa-solid fa-user"></i> Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('wishlist.index') }}">
                                        <i class="fa-solid fa-heart text-danger"></i> Wishlist
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa-solid fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>                  
                        
                        @else
                        <!-- Jika User Belum Login -->
                        <a href="{{ route('login') }}" class="btn btn-masuk px-4 fw-bold">Masuk</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
