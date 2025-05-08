<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
<body>
    <!-- Footer -->
    <footer class="footer bg-footer py-4">
        <div class="container">
            <div class="row justify-content-end">
                <!-- Brand dan Deskripsi -->
                <div class="col-md-3">
                    <h3 class="fw-bold">Say_Hi.Co</h3>
                    <p>Homemade with Premium Taste</p>
                </div>
    
                <!-- Menu Halaman -->
                <div class="col-md-2">
                    <h4 class="">Halaman</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('produk.index') }}"  class="footer-link">Produk</a></li>
                        <li><a href="{{ route('testimoni.index') }}"  class="footer-link">Testimoni</a></li>
                        <li><a href="{{ route('caraorder.index') }}"  class="footer-link">Cara Order</a></li>
                    </ul>
                </div>
    
                <!-- Menu Komunitas -->
                <div class="col-md-2">
                    <h4 class="">Komunitas</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('portfolio.index') }}"  class="footer-link">Portfolio</a></li>
                    </ul>
                </div>
    
                <!-- Menu Hubungi Kami -->
                <div class="col-md-2">
                    <h4 class="">Hubungi Kami</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('kontakkami.index') }}"  class="footer-link">Kontak Kami</a></li>
                        <li><a href="{{ route('tentangkami.index') }}"  class="footer-link">Tentang Kami</a></li>
                        <li><a href="{{ route('faqs.index') }}"  class="footer-link">FAQs</a></li>
                    </ul>
                </div>
    
                <!-- Media Sosial -->
                <div class="col-md-3 text-center mt-4 mt-md-0">
                    <h4 class="mb-3">Media Sosial</h4>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
    
            <!-- Copyright -->
            <hr class="text-white my-4">
            <div>
                &copy; 2025 <span class="fw-bold">Say_Hi.Co</span> All Rights Reserved.
            </div>
        </div>
    </footer>
    
</body>
</html>