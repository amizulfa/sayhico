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
                @method('PUT')
        
                <div class="mb-3">
                    <label for="media" class="form-label">Ganti Media (Opsional)</label>
                    <input type="file" class="form-control" name="media">
                    @if($testimoni->media)
                        <div class="mt-2">
                            @if(Str::endsWith($testimoni->media, ['.mp4', '.mov', '.avi']))
                                <video src="{{ asset('storage/' . $testimoni->media) }}" width="120" controls></video>
                            @else
                                <img src="{{ asset('storage/' . $testimoni->media) }}" width="120" class="img-thumbnail">
                            @endif
                        </div>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="platform" class="form-label">Platform</label>
                    <select name="platform" class="form-control" required>
                        <option value="Whatsapp" {{ $testimoni->platform == 'Whatsapp' ? 'selected' : '' }}>Whatsapp</option>
                        <option value="Instagram" {{ $testimoni->platform == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                    </select>
                </div>
        
                <button type="submit" class="btn btn-primary">Update</button>
            </form>           
        </div>
    </div>
</div>
@endsection
