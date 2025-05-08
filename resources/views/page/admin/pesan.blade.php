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
    <table class="table">
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
