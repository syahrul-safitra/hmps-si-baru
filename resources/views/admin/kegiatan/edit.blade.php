@extends('admin.layouts.main')

@section('container')
    <div class="card-body">
        <h2 class="card-title mx-auto">Tambah Kegiatan</h2>

        <form action="{{ url('kegiatan/' . $kegiatan->id) }}" method="post" class="w-2/3 mx-auto"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Nama Kegiatan</span>
                </div>
                <input type="text" placeholder="Type here" name="nama_kegiatan"
                    value="{{ @old('nama_kegiatan', $kegiatan->nama_kegiatan) }}"
                    class="input input-bordered w-full @error('nama_kegiatan') input-error @enderror" />
                @error('nama_kegiatan')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Tanggal & Waktu Mulai <span class="text-red-700"> (*minimal input waktu pukul 3
                            jam
                            kedepan)</span></span>
                </div>
                @php
                    $now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

                    $now->modify('+3 hours');
                @endphp

                {{-- <input type="datetime-local" placeholder="Type here" name="tanggal_waktu"
                    value="{{ @old('tanggal_waktu') }}" min="{{ $now->format('Y-m-d H:i') }}"
                    class="input input-bordered w-full @error('tanggal_waktu') input-error @enderror" />
                 --}}
                <input type="datetime-local" placeholder="Type here" name="tanggal_waktu_mulai"
                    value="{{ @old('tanggal_waktu_mulai', $kegiatan->tanggal_waktu_mulai) }}""
                    class="input input-bordered w-full @error('tanggal_waktu') input-error @enderror" />



                @error('tanggal_waktu_mulai')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Tanggal & Waktu Akhir <span class="text-red-700"> (*minimal input waktu pukul 1
                            jam
                            setelah waktu mulai)</span></span>
                </div>
                {{-- @php
                    $now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

                    $now->modify('+3 hours');
                @endphp --}}

                {{-- <input type="datetime-local" placeholder="Type here" name="tanggal_waktu_akhir"
                    value="{{ @old('tanggal_waktu') }}" min="{{ $now->format('Y-m-d H:i') }}"
                    class="input input-bordered w-full @error('tanggal_waktu') input-error @enderror" /> --}}


                <input type="datetime-local" placeholder="Type here" name="tanggal_waktu_akhir"
                    value="{{ @old('tanggal_waktu_akhir', $kegiatan->tanggal_waktu_akhir) }}"
                    class="input input-bordered w-full @error('tanggal_waktu') input-error @enderror" />
                @error('tanggal_waktu_akhir')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Tempat</span>
                </div>
                <input type="text" placeholder="Type here" name="tempat" value="{{ @old('tempat', $kegiatan->tempat) }}"
                    class="input input-bordered w-full @error('tempat') input-error @enderror" />
                @error('tempat')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Deskripsi</span>
                </div>

                <textarea class="textarea textarea-primary" name="deskripsi" placeholder="Type here" rows="4" cols="50">{{ @old('deskripsi', $kegiatan->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Thumbnail</span>
                </div>
                <input type="file" id="image" onchange="previewImage()" name="thumbnail"
                    class="file-input file-input-bordered file-input-info w-full max-w-xs" accept=".png, .jpg, .jpeg" />

                <img class="w-64 rounded mt-4" id="img-preview">
                @error('thumbnail')
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
