@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('title', 'Edit Testimoni')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white" style="background-color: #6b78c2;">
            <h5  class="mb-0">Edit Testimoni</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.testimoni.update', $testimoni->id_testi) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" value="{{ $testimoni->nama_pembeli }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="waktu_pembelian" class="form-label">Waktu Pembelian</label>
                    <input type="date" name="waktu_pembelian" id="waktu_pembelian" class="form-control" value="{{ $testimoni->waktu_pembelian }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="variasi" class="form-label">Variasi</label>
                    <input type="text" name="variasi" id="variasi" class="form-control" value="{{ $testimoni->variasi }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}" {{ $k->id_kategori == $testimoni->id_kategori ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $testimoni->deskripsi }}</textarea>
                </div>
            
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" name="rating" id="rating" class="form-control" value="{{ $testimoni->rating }}" required min="1" max="5">
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Gambar Testimoni</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $testimoni->gambar_testi) }}" alt="Testimoni" width="100">
                    </div>
                    <input type="file" name="gambar_testi" class="form-control">
                </div>
            
                <button type="submit" class="btn btn-success">Update Testimoni</button>
                <a href="{{ route('admin.testimoni') }}" class="btn btn-secondary">Batal</a>
            </form>            
        </div>
    </div>
</div>
@endsection
