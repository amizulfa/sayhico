@extends('layouts.layout')

@section('landingpage')
    @php
        $testimoni = \App\Models\Testimoni::with('kategori')->orderBy('waktu_pembelian', 'desc')->get();

    @endphp
    
    @php
        $portfolio = \App\Models\Portfolio::get();
    @endphp

    @include('page.landingpage', ['testimoni' => $testimoni])
@endsection
