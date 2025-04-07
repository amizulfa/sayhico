@extends('layouts.layout')

@section('landingpage')
<div class="container mt-5 mb-5">
    <h2 class="mb-4">Edit Data Diri</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama', $user->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
        </button>
    </form>
</div>
@endsection
