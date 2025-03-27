@extends('layout')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Tambah Produk</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-select" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="ukuran" class="form-label">Ukuran</label>
                    <input type="text" name="ukuran" id="ukuran" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="gambar_produk" class="form-label">Gambar Produk 1</label>
                    <input type="file" name="gambar_produk" id="gambar_produk" class="form-control" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label for="gambar_produk2" class="form-label">Gambar Produk 2 (Opsional)</label>
                    <input type="file" name="gambar_produk2" id="gambar_produk2" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="gambar_produk3" class="form-label">Gambar Produk 3 (Opsional)</label>
                    <input type="file" name="gambar_produk3" id="gambar_produk3" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('produk') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
