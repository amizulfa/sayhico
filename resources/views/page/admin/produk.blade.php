@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('title', 'Produk')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Produk</h2>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Ukuran</th>
                            <th>Deskripsi</th>
                            <th>Gambar Produk 1</th>
                            <th>Gambar Produk 2</th>
                            <th>Gambar Produk 3</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>Rp {{ number_format((int) str_replace(['.', ','], '', $item->harga), 0, ',', '.') }}</td>
                            <td>{{ $item->ukuran }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar_produk) }}" width="50" class="img-thumbnail">
                            </td>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar_produk2) }}" width="50" class="img-thumbnail">
                            </td>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar_produk3) }}" width="50" class="img-thumbnail">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.produk.edit', $item->id_produk) }}" class="btn btn-light border me-1">
                                        <i class="fa-solid fa-pen-to-square" style="color: #6c757d;"></i>
                                    </a>

                                    <form action="{{ route('admin.produk.destroy', $item->id_produk) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light border" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fa-solid fa-trash" style="color: #eb0000;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>                   
                        @endforeach
                    </tbody>
                </table>
</div>
@endsection
