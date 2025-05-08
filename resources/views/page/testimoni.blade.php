@extends('layouts.layout')

@section('landingpage')
<div class="container" style="margin-top: 150px;">
    <h1 class="title-h1 text-center mb-5">Testimoni</h1>

    <!-- WhatsApp Section -->
    <div class="d-flex align-items-center mb-3">
        <img src="{{ asset('images/logowa.png') }}" alt="WhatsApp" style="width:40px; height:30px; margin-right:10px;">
        <h3 class="mb-0">WhatsApp</h3>
    </div>
    <div class="d-flex flex-row flex-wrap gap-3 mb-5">
        @foreach ($whatsapp as $item)
            @php
                $extension = pathinfo($item->media, PATHINFO_EXTENSION);
            @endphp

            @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                <img src="{{ asset('storage/' . $item->media) }}" alt="Image Testimoni" style="width:250px; height:auto; object-fit:fill; border-radius:10px;">
            @elseif (in_array(strtolower($extension), ['mp4', 'mov', 'avi']))
                <video src="{{ asset('storage/' . $item->media) }}" controls style="width:250px; height:auto; object-fit:fill; border-radius:10px;"></video>
            @else
                <p>File tidak dikenali</p>
            @endif
        @endforeach
    </div>

    <!-- Instagram Section -->
    <div class="d-flex align-items-center mb-3">
        <img src="{{ asset('images/logoig.jpg') }}" alt="Instagram" style="width:30px; height:30px; margin-right:10px;">
        <h3 class="mb-0">Instagram</h3>
    </div>
    <div class="d-flex flex-row flex-wrap gap-3 mb-5">
        @foreach ($instagram as $item)
            @php
                $extension = pathinfo($item->media, PATHINFO_EXTENSION);
            @endphp

            @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                <img src="{{ asset('storage/' . $item->media) }}" alt="Image Testimoni" style="width:250px; height:auto; object-fit:fill; border-radius:10px;">
            @elseif (in_array(strtolower($extension), ['mp4', 'mov', 'avi']))
                <video src="{{ asset('storage/' . $item->media) }}" controls style="width:250px; height:auto; object-fit:fill; border-radius:10px;"></video>
            @else
                <p>File tidak dikenali</p>
            @endif
        @endforeach
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/page/testimoni.css') }}">
@endsection
