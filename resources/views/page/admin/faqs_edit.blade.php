@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Edit Faqs</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.faqs.update', $faq->id_faqs) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="pertanyaan" class="form-label">Pertanyaan</label>
                    <textarea name="pertanyaan" id="pertanyaan" class="form-control" required>{{ $faq->pertanyaan }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="jawaban" class="form-label">Jawaban</label>
                    <textarea name="jawaban" id="jawaban" class="form-control" required>{{ $faq->jawaban }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="id_kategorifaqs" class="form-label">Kategori</label>
                    <select name="id_kategorifaqs" id="id_kategorifaqs" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategorifaqs }}" 
                                {{ $faq->id_kategorifaqs == $k->id_kategorifaqs ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.faqs') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
