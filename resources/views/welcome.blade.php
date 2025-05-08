@extends('layouts.layout')

@section('landingpage')
    @php
        $testimoni = \App\Models\Testimoni::get();

    @endphp
    
    @php
        $portfolio = \App\Models\Portfolio::get();
    @endphp

    @include('page.landingpage', ['testimoni' => $testimoni])
@endsection
