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

    <table id="produkTable" class="table">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Ukuran</th>
                <th>Deskripsi</th>
                <th>Gambar 1</th>
                <th>Gambar 2</th>
                <th>Gambar 3</th>
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
                <td><img src="{{ asset('storage/' . $item->gambar_produk) }}" width="50" class="img-thumbnail"></td>
                <td><img src="{{ asset('storage/' . $item->gambar_produk2) }}" width="50" class="img-thumbnail"></td>
                <td><img src="{{ asset('storage/' . $item->gambar_produk3) }}" width="50" class="img-thumbnail"></td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <!-- jQuery & DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#produkTable').DataTable({
                order: [[2, 'asc']], // Urut default berdasarkan Nama Produk
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' // Bahasa Indonesia
                }
            });
        });
    </script>
@endpush
