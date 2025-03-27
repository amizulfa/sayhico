@extends('layout')

@section('title', 'Edit Produk')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Edit Produk</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="{{ $produk->harga }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $produk->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="ukuran" class="form-label">Ukuran</label>
                    <input type="text" name="ukuran" id="ukuran" class="form-control" value="{{ $produk->ukuran }}" required>
                </div>

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}" {{ $k->id_kategori == $produk->id_kategori ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Produk</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="Produk" width="100">
                    </div>
                    <input type="file" name="gambar_produk" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Produk 2 (Opsional)</label>
                    @if($produk->gambar_produk2)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $produk->gambar_produk2) }}" alt="Produk" width="100">
                        </div>
                    @endif
                    <input type="file" name="gambar_produk2" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Produk 3 (Opsional)</label>
                    @if($produk->gambar_produk3)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $produk->gambar_produk3) }}" alt="Produk" width="100">
                        </div>
                    @endif
                    <input type="file" name="gambar_produk3" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Update Produk</button>
                <a href="{{ route('produk') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
