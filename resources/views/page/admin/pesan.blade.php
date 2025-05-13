@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('title', 'Pesan')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Pesan</h3>
    </div>

    @if($pesans->isEmpty())
        <p>Belum ada pesan.</p>
    @else
    <table id="pesanTable" class="table">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Pesan</th>
                <th>Waktu Kirim</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesans as $pesan)
                <tr>
                    <td>{{ $pesan->firstname }} {{ $pesan->lastname }}</td>
                    <td>{{ $pesan->email }}</td>
                    <td>{{ $pesan->phone }}</td>
                    <td>{{ $pesan->message }}</td>
                    <td>{{ $pesan->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        @if($pesan->is_read)
                            <span class="badge bg-success">
                                <i class="fa-solid fa-check-circle"></i> Sudah Dibaca
                            </span>
                        @else
                            <span class="badge bg-warning text-dark">
                                <i class="fa-solid fa-eye-slash"></i> Belum Dibaca
                            </span>
                        @endif
                    </td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('pesan.detail', $pesan->id_kontak) }}" class="btn btn-info btn-sm">Detail</a>
                        
                        @if(!$pesan->is_read)
                            <form method="POST" action="{{ route('pesan.baca', $pesan->id_kontak) }}">
                                @csrf
                                <button class="btn btn-primary btn-sm">Baca</button>
                            </form>
                        @endif
                    </td>                 
                </tr>
            @endforeach
        </tbody>
    </table>
    

        {{ $pesans->links() }} <!-- pagination -->
    @endif
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
            $('#pesanTable').DataTable({
                order: [[1, 'asc']], // Urut default berdasarkan Nama Kategori
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json' // Bahasa Indonesia
                }
            });
        });
    </script>
@endpush
