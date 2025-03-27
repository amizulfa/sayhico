@extends('layout')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Tambah Testimoni</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Pembeli</label>
                    <input type="text" class="form-control" name="nama_pembeli" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Waktu Pembelian</label>
                    <input type="date" class="form-control" name="waktu_pembelian" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Variasi</label>
                    <input type="text" class="form-control" name="variasi" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori Produk</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <input type="number" class="form-control" name="rating" min="1" max="5" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Testimoni</label>
                    <input type="file" class="form-control" name="gambar_testi" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('testimoni') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
