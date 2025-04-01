@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('title', 'Tambah Portfolio')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Tambah Portfolio</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="gambar_port" class="form-label">Upload Gambar</label>
                    <input type="file" name="gambar_port" id="gambar_port" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.portfolio') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
