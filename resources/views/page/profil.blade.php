@extends('layouts.layout')

@section('landingpage')
<div class="container px-4" style="padding-top:150px; padding-bottom:50px;">
    <h1 class="fw-bold mb-4 text-center">Profil Saya</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama', $user->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Alamat Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <a href="{{ route('profil.edit') }}" class="btn btn-outline-primary">
            <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profil
        </a>
        
    </form>
</div>
@endsection
