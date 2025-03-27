@extends('layout')

@section('title', 'Edit Portfolio')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Edit Portfolio</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('portfolio.update', $portfolio->id_port) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Gambar Portfolio Saat Ini</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $portfolio->gambar_port) }}" alt="Portfolio" width="100">
                    </div>
                    <label for="gambar_port" class="form-label">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar_port" id="gambar_port" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('portfolio') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
