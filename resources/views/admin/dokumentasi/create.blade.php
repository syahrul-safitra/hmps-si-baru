@extends('admin.layouts.main')

@section('container')
    <div class="card-body">
        <h2 class="card-title mx-auto">Tambah Dokumentasi</h2>

        <form action="{{ url('dokumentasi') }}" method="post" class="w-2/3 mx-auto" enctype="multipart/form-data">
            @csrf
            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Nama Kegiatan</span>
                </div>
                <input type="text" placeholder="Type here" name="nama" value="{{ @old('nama') }}"
                    class="input input-bordered w-full @error('nama') input-error @enderror" />
                @error('nama')
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
                    <span class="label-text">Keterangan</span>
                </div>

                <textarea class="textarea textarea-primary" name="keterangan" placeholder="Type here" rows="4" cols="50">{{ @old('keterangan') }}</textarea>

                @error('keterangan')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Link G-Drive</span>
                </div>

                <textarea class="textarea textarea-primary" name="link_gdrive" placeholder="Type here" rows="4" cols="50">{{ @old('link_gdrive') }}</textarea>

                @error('link_gdrive')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <div class="flex mt-4 gap-4">
                <a class="btn btn-primary" href="{{ url('dokumentasi') }}">Batal</a>
                <button class="btn btn-info">Simpan</button>
            </div>
        </form>
    </div>
@endsection
