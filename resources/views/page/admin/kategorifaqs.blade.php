@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Kategori Faqs</h3>
        <a href="{{ route('admin.kategorifaqs.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Kategori Faqs
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="kategoriTable" class="table">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.kategorifaqs.edit', $k->id_kategorifaqs) }}" class="btn btn-light border me-1">
                                <i class="fa-solid fa-pen-to-square" style="color: #6c757d;"></i>
                            </a>
                            <form action="{{ route('admin.kategorifaqs.destroy', $k->id_kategorifaqs) }}" method="POST" style="display:inline;">
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
            $('#kategoriTable').DataTable({
                order: [[1, 'asc']], // Urut default berdasarkan Nama Kategori
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' // Bahasa Indonesia
                }
            });
        });
    </script>
@endpush
