@extends('layouts.layout')

@section('landingpage') 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kategori Produk</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .category-card {
                position: relative;
                overflow: hidden;
                cursor: pointer;
            }
            .category-card img {
                width: 100%;
                height: 250px;
                object-fit: cover;
            }
            .category-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                background: rgba(0, 0, 0, 0.6);
                color: white;
                text-align: center;
                padding: 15px;
                font-size: 1.5rem;
            }
            .category-card a {
                text-decoration: none;
                color: inherit;
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="position-relative">
            <img src="https://storage.googleapis.com/a1aa/image/bAkGdosjbMw4GDlNPfW2m3UA6BEiPmazz3_xVbgGLlU.jpg" alt="Close-up of cookies with almond slices on top" class="w-100" style="height: 400px; object-fit: cover;">
            <div class="category-title text-center text-white font-weight-bold" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 2.5rem;">
                Kategori Produk
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="{{ route('produk.index') }}" class="d-block">
                        <div class="card category-card">
                            <img src="https://storage.googleapis.com/a1aa/image/SRjSSji4eKpOat4NbItdT6Iinj9MXdh1zryeC8TQIoM.jpg" alt="Various packaged products">
                            <div class="category-overlay">
                                <h2>Semua Produk</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="{{ route('produk.index', ['kategori' => 'Cookies']) }}" class="d-block">
                        <div class="card category-card">
                            <img src="https://storage.googleapis.com/a1aa/image/eUnscEZQl3bCHOUY1cSCjgtiN3Z44Gy4tUpvwtjnlt4.jpg" alt="Assorted cookies on a table">
                            <div class="category-overlay">
                                <h2>Cookies</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="{{ route('produk.index', ['kategori' => 'Cake']) }}" class="d-block">
                        <div class="card category-card">
                            <img src="https://storage.googleapis.com/a1aa/image/L9gtRarNgF6uOuTTvWwZFWuukDTty6nYHKNW4fJQYls.jpg" alt="Slices of cake on a plate">
                            <div class="category-overlay">
                                <h2>Cakes</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
