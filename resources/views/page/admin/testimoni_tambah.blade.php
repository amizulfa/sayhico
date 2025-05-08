@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Tambah Testimoni</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        
                <div class="mb-3">
                    <label for="media" class="form-label">Upload Media</label>
                    <input type="file" class="form-control" name="media" required>
                </div>
        
                <div class="mb-3">
                    <label for="platform" class="form-label">Platform</label>
                    <select name="platform" class="form-control" required>
                        <option value="">-- Pilih Platform --</option>
                        <option value="Whatsapp">Whatsapp</option>
                        <option value="Instagram">Instagram</option>
                    </select>
                </div>
        
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
