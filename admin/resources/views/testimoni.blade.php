@extends('layout')

@section('title', 'Testimoni Produk')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Testimoni Produk</h3>
        <a href="{{ route('testimoni.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Testimoni
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Waktu Pembelian</th>
                            <th>Variasi</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Rating</th>
                            <th>Gambar Testimoni</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $index => $t)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $t->nama_pembeli }}</td>
                                <td>{{ $t->waktu_pembelian }}</td>
                                <td>{{ $t->variasi }}</td>
                                <td>{{ $t->kategori->nama_kategori }}</td>
                                <td>{{ $t->deskripsi }}</td>
                                <td>{{ $t->rating }}/5</td>
                                <td>
                                    @if($t->gambar_testi)
                                        <img src="{{ asset('storage/' . $t->gambar_testi) }}" width="50" class="img-thumbnail">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('testimoni.edit', $t->id_testi) }}" class="btn btn-light border me-1">
                                            <i class="fa-solid fa-pen-to-square" style="color: #6c757d;"></i>
                                        </a>
                                        <form action="{{ route('testimoni.destroy', $t->id_testi) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light border" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fa-solid fa-trash" style="color: #eb0000;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</div>
@endsection
