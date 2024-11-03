@extends('admin.layouts.main')

@section('container')
    <div class="card-body">
        <h2 class="card-title mx-auto">Tambah Berita</h2>

        <form action="{{ url('berita') }}" method="post" class="w-2/3 mx-auto" enctype="multipart/form-data">
            @csrf
            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Judul</span>
                </div>
                <input type="text" placeholder="Type here" name="judul" value="{{ @old('judul') }}"
                    class="input input-bordered w-full @error('judul') input-error @enderror" />
                @error('judul')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Tanggal</span>
                </div>
                <input type="date" placeholder="Type here" name="tanggal" value="{{ @old('tanggal') }}"
                    class="input input-bordered w-full @error('tanggal') input-error @enderror" />
                @error('tanggal')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Gambar</span>
                </div>
                <input type="file" id="image" onchange="previewImage()" name="gambar"
                    class="file-input file-input-bordered file-input-info w-full max-w-xs" accept=".png, .jpg, .jpeg" />

                <img class="w-64 rounded mt-4" id="img-preview">
                @error('gambar')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full mt-4">
                <input id="x" type="hidden" name="deskripsi" value="{{ @old('deskripsi') }}">
                <trix-editor input="x"></trix-editor>
                @error('deskripsi')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <div class="flex mt-4 gap-4">
                <a class="btn btn-primary" href="{{ url('berita') }}">Batal</a>
                <button class="btn btn-info">Simpan</button>
            </div>
        </form>
    </div>
@endsection
