<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom border-dark">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}" >
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="70">
            </a>
    
            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-5">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'fw-bold' : '' }}" 
                           href="{{ url('/') }}" 
                           style="color: var(--primary-color);">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kategoriproduk') ? 'fw-bold' : '' }}" 
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
                </ul>
            </div>
        </div>
    </nav>
    
    
</body>
</html>