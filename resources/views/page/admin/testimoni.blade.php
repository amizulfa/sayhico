@extends(session('is_admin') ? 'page.admin.layout' : 'layout')

@section('title', 'Testimoni Produk')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Testimoni Produk</h3>
        <a href="{{ route('admin.testimoni.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Testimoni
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Media</th>
                            <th>Platform</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $index => $t)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($t->media)
                                        @if(Str::endsWith($t->media, ['.mp4', '.mov', '.avi']))
                                            <video src="{{ asset('storage/' . $t->media) }}" width="100" controls></video>
                                        @else
                                            <img src="{{ asset('storage/' . $t->media) }}" width="100" class="img-thumbnail">
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $t->platform }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.testimoni.edit', $t->id_testi) }}" class="btn btn-light border me-1">
                                            <i class="fa-solid fa-pen-to-square" style="color: #6c757d;"></i>
                                        </a>
                                        <form action="{{ route('admin.testimoni.destroy', $t->id_testi) }}" method="POST" style="display:inline;">
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
