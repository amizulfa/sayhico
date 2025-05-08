@extends('layouts.layout')

@section('landingpage')
<div class="container px-4" style="padding-top:150px; padding-bottom:50px;">
    <div class="row align-items-center">
        <div class="col-2 d-flex justify-content-start">
            <a href="{{ route('profil.index') }}" class="text-dark fw-bold d-flex align-items-center btn-back" style="text-decoration: none;">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <div class="col-8 text-center mb-5">
            <h1 class="fw-bold m-0">Edit Profil</h1>
        </div>
        <div class="col-2"></div>
    </div>

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

        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
        </button>
    </form>
</div>
@endsection
