@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Faqs</h3>
        <a href="{{ route('faqs.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Faqs
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $index => $faq)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $faq->pertanyaan }}</td>
                <td>{{ $faq->jawaban }}</td>
                <td>{{ $faq->kategori->nama_kategori }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('faqs.edit', $faq->id_faqs) }}" class="btn btn-light border me-1">
                            <i class="fa-solid fa-pen-to-square" style="color: #6c757d;"></i>
                        </a>
                        <form action="{{ route('faqs.destroy', $faq->id_faqs) }}" method="POST" style="display:inline;">
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
