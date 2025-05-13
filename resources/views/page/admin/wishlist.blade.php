@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('title', 'Produk Tersimpan')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Produk Tersimpan oleh User</h3>

        <!-- Filter Tanggal -->
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-control"
                    value="{{ request('start_date') }}">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Tanggal Akhir</label>
                <input type="date" name="end_date" id="end_date" class="form-control"
                    value="{{ request('end_date') }}">
            </div>
            <div class="col-md-4 align-self-end">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('admin.wishlist') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <!-- Tabel Produk Tersimpan -->
        <table id="wishlistTable" class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Ukuran</th>
                    <th>Tanggal Disimpan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($wishlistItems as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->user->nama ?? '-' }}</td>
                        <td>{{ $item->produk->nama_produk ?? '-' }}</td>
                        <td>{{ $item->produk->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->produk->ukuran ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_simpan)->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada data wishlist.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('styles')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <!-- jQuery dan DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#wishlistTable').DataTable({
                order: [[5, 'desc']], // Urut default berdasarkan tanggal simpan (kolom ke-6)
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' // Bahasa Indonesia
                }
            });
        });
    </script>
@endpush
