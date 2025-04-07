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
                @foreach($kategoriFaqs as $kategori)
                    <option value="{{ strtolower($kategori->nama_kategori) }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>            
        </div>
    </div>

    <div class="accordion mb-5" id="faqAccordion">
        @foreach($faqs as $index => $faq)
        <div class="card faq-item" data-category="{{ strtolower($faq->kategori->nama_kategori ?? 'umum') }}">
            <div class="card-header" id="heading{{ $index }}">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left font-weight-bold d-flex justify-content-between align-items-center collapsed"
                            type="button" data-toggle="collapse" data-target="#collapse{{ $index }}"
                            aria-expanded="false" aria-controls="collapse{{ $index }}">
                        {{ $faq->pertanyaan }}
                        <i class="fas fa-chevron-right arrow"></i>
                    </button>
                </h2>
            </div>
            <div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-parent="#faqAccordion">
                <div class="card-body text-muted">
                    {{ $faq->jawaban }}
                </div>
            </div>
        </div>
        @endforeach
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
