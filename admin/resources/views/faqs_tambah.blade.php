@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Tambah Faqs</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('faqs.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="pertanyaan" class="form-label">Pertanyaan</label>
                    <textarea name="pertanyaan" id="pertanyaan" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="jawaban" class="form-label">Jawaban</label>
                    <textarea name="jawaban" id="jawaban" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="id_kategorifaqs" class="form-label">Kategori</label>
                    <select name="id_kategorifaqs" id="id_kategorifaqs" class="form-control" required>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategorifaqs }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('faqs') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
