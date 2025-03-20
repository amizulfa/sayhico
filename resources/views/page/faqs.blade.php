@extends('layouts.layout')

@section('landingpage') 
<div class="container mt-5">
    <h1 class="font-weight-bold text-center title-h1">
        Frequently Asked Questions
    </h1>
    <p class="text-dark text-center">Punya pertanyaan seputar produk, pemesanan, atau pengiriman? Temukan jawabannya di sini!</p>

    <!-- Search & Dropdown -->
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <label for="search">Cari</label>
            <input type="text" id="search" class="form-control" placeholder="Cari pertanyaan...">
        </div>
        <div class="col-md-4">
            <label for="category">Kategori</label>
            <select id="category" class="form-control">
                <option value="all" selected>Semua</option>
                <option value="produk">Produk</option>
                <option value="pemesanan">Pemesanan</option>
                <option value="pembayaran">Pembayaran</option>
            </select>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="accordion mb-5" id="faqAccordion">
        <!-- FAQ 1 -->
        <div class="card faq-item" data-category="produk">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left font-weight-bold d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Apa itu produk A?
                        <i class="fas fa-chevron-down arrow"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                <div class="card-body text-muted">
                    Produk A adalah produk unggulan kami yang memiliki kualitas terbaik di kelasnya.
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="card faq-item" data-category="pemesanan">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left font-weight-bold d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Bagaimana cara melakukan pemesanan?
                        <i class="fas fa-chevron-right arrow"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                <div class="card-body text-muted">
                    Anda dapat melakukan pemesanan melalui website atau aplikasi kami dengan mudah.
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="card faq-item" data-category="pembayaran">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left font-weight-bold d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Apa metode pembayaran yang tersedia?
                        <i class="fas fa-chevron-right arrow"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                <div class="card-body text-muted">
                    Kami menerima pembayaran melalui transfer bank, kartu kredit, dan e-wallet.
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 10px;
    }
    .card-header {
        background: white;
        border-bottom: none;
    }
    .btn-link {
        width: 100%;
        text-decoration: none;
        color: black;
        padding: 15px;
        font-size: 16px;
    }
    .btn-link:hover {
        text-decoration: none;
    }
    .arrow {
        transition: transform 0.3s ease;
    }
    .collapsed .arrow {
        transform: rotate(0deg);
    }
    .collapse.show .arrow {
        transform: rotate(90deg);
    }
</style>

<script>
    $(document).ready(function () {
        // Toggle arrow icons
        $('.btn-link').on('click', function () {
            let icon = $(this).find('.arrow');
            if ($(this).attr('aria-expanded') === "true") {
                icon.removeClass('fa-chevron-right').addClass('fa-chevron-down');
            } else {
                icon.removeClass('fa-chevron-down').addClass('fa-chevron-right');
            }
        });

        // Search functionality
        $('#search').on('keyup', function () {
            let value = $(this).val().toLowerCase();
            $('.faq-item').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Filter by category
        $('#category').on('change', function () {
            let selectedCategory = $(this).val();
            $('.faq-item').each(function () {
                if (selectedCategory === "all") {
                    $(this).show();
                } else {
                    $(this).toggle($(this).attr('data-category') === selectedCategory);
                }
            });
        });
    });
</script>

@endsection
