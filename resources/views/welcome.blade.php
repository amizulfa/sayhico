@extends('layouts.layout')

@section('landingpage')
    @php
        $testimoni = \App\Models\Testimoni::with('kategoriData')->orderBy('waktu_pembelian', 'desc')->get();
    @endphp

    @include('page.landingpage', ['testimoni' => $testimoni])
@endsection
