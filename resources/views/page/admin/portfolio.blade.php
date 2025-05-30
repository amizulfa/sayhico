@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('title', 'Daftar Portfolio')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Portfolio Produk</h3>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Portfolio
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="portfolioTable" class="table">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolio as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><img src="{{ asset('storage/' . $p->gambar_port) }}" alt="Portfolio" width="100"></td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.portfolio.edit', $p->id_port) }}" class="btn btn-light border me-1">
                                <i class="fa-solid fa-pen-to-square" style="color: #6c757d;"></i>
                            </a>
                            <form action="{{ route('admin.portfolio.destroy', $p->id_port) }}" method="POST" style="display:inline;">
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
    <!-- jQuery dan DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#portfolioTable').DataTable({
                order: [[0, 'asc']], // Urut default berdasarkan Nama Kategori
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' // Bahasa Indonesia
                }
            });
        });
    </script>
@endpush
