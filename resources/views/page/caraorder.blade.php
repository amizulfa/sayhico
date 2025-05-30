@extends('layouts.layout')

@section('landingpage') 
    <div class="container" style="margin-top: 150px;">
        <h1 class="mb-5 font-weight-bold text-center title-h1">
            Cara Order
           </h1>
           <div class="container">
            <div class="row">
             <!-- Card 1 -->
             <div class="col-md-6 mb-4 d-flex">
              <div class="card card-custom text-center p-4 flex-fill">
               <div class="circle mx-auto">
                <span class="font-weight-bold text-light">
                 1
                </span>
               </div>
               <img alt="Illustration of a person choosing a product on a mobile phone" class="card-img-top mx-auto mb-3" src="{{ asset('images/caraorder/1.png') }}"/>
               <div class="card-body">
                <h5 class="card-title font-weight-bold">
                 Pilih Produk
                </h5>
                <p class="card-text text-muted">
                 Lihat katalog produk
                 <i>
                  cookies
                 </i>
                 kami dan pilih varian favorit Anda.
                </p>
               </div>
              </div>
             </div>
             <!-- Card 2 -->
             <div class="col-md-6 mb-4 d-flex">
              <div class="card card-custom text-center p-4 flex-fill">
               <div class="circle mx-auto">
                <span class="font-weight-bold text-light">
                 2
                </span>
               </div>
               <img alt="Illustration of a person contacting via WhatsApp" class="card-img-top mx-auto mb-3" src="{{ asset('images/caraorder/2.png') }}"/>
               <div class="card-body">
                <h5 class="card-title font-weight-bold">
                 Hubungi Kami via Whatsaap
                </h5>
                <p class="card-text text-muted">
                 Kirim pesan ke WhatsApp kami dengan format: Nama | Produk yang dipesan | Jumlah | Metode Pembayaran | Alamat Pengiriman
                </p>
               </div>
              </div>
             </div>
             <!-- Card 3 -->
             <div class="col-md-6 mb-4 d-flex">
              <div class="card card-custom text-center p-4 flex-fill">
               <div class="circle mx-auto">
                <span class="font-weight-bold text-light">
                 3
                </span>
               </div>
               <img alt="Illustration of a person confirming payment on a mobile phone" class="card-img-top mx-auto mb-3" src="{{ asset('images/caraorder/3.png') }}"/>
               <div class="card-body">
                <h5 class="card-title font-weight-bold">
                 Konfirmasi Pembayaran
                </h5>
                <p class="card-text text-muted">
                 Lakukan pembayaran sesuai metode pembayaran yang digunakan.
                </p>
               </div>
              </div>
             </div>
             <!-- Card 4 -->
             <div class="col-md-6 mb-4 d-flex">
              <div class="card card-custom text-center p-4 flex-fill">
               <div class="circle mx-auto">
                <span class="font-weight-bold text-light">
                 4
                </span>
               </div>
               <img alt="Illustration of a person receiving a package" class="card-img-top mx-auto mb-3"src="{{ asset('images/caraorder/4.png') }}"/>
               <div class="card-body">
                <h5 class="card-title font-weight-bold">
                 Pesanan diproses dan dikirim
                </h5>
                <p class="card-text text-muted">
                 Setelah pembayaran dikonfirmasi, pesanan Anda akan segera diproses dan dikirim ke alamat tujuan.
                </p>
               </div>
              </div>
             </div>
            </div>
           </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/page/caraorder.css') }}">
@endsection