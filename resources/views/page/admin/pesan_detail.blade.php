@extends('page.admin.layout')

@section('title', 'Detail Pesan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detail Pesan</h2>

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $pesan->firstname }} {{ $pesan->lastname }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $pesan->email }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $pesan->phone }}</td>
        </tr>
        <tr>
            <th>Pesan</th>
            <td>{{ $pesan->message }}</td>
        </tr>
        <tr>
            <th>Waktu Kirim</th>
            <td>{{ $pesan->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if($pesan->is_read)
                    <span class="badge bg-success">Sudah Dibaca</span>
                @else
                    <span class="badge bg-warning text-dark">Belum Dibaca</span>
                @endif
            </td>
        </tr>
    </table>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
