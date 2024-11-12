@extends('gues.layouts.main')

@section('container')
    <div class="container mx-auto py-5">
        <div class="card bg-base-100 w-full shadow-xl mx-auto">

            @if (session()->has('error'))
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="card-body">
                <h2 class="card-title mx-auto">Pendaftaran Partisipasi Kegiatan {{ $data->nama_kegiatan }}</h2>
            </div>

            <div class="card-body">
                <form action="{{ url('daftar-partisipasi') }}" method="post" enctype="multipart/form-data"
                    class="w-full lg:w-4/5 mx-auto">

                    @csrf

                    <input type="hidden" name="promosi_kegiatan_id" value="{{ $data->id }}">

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Nama</span>
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
                            <span class="label-text">NIM</span>
                        </div>
                        <input type="text" placeholder="Type here" name="nim" value="{{ @old('nim') }}"
                            class="input input-bordered w-full @error('nim') input-error @enderror" maxlength="11" />
                        @error('nim')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Semester</span>
                        </div>
                        <input type="number" placeholder="Type here" name="semester" value="{{ @old('semester') }}"
                            class="input input-bordered w-full @error('semester') input-error @enderror" maxlength="2" />
                        @error('semester')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Kelas</span>
                        </div>
                        <input type="text" placeholder="Type here" name="kelas" value="{{ @old('kelas') }}"
                            class="input input-bordered w-full @error('kelas') input-error @enderror" maxlength="1" />
                        @error('kelas')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">No WA</span>
                        </div>
                        <input type="number" placeholder="Type here" name="no_wa" value="{{ @old('no_wa') }}"
                            class="input input-bordered w-full @error('no_wa') input-error @enderror" />
                        @error('no_wa')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <div class="flex mt-4 gap-4">
                        <a class="btn btn-primary" href="{{ url('/') }}">Kembali</a>
                        <button class="btn btn-info">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Notification --}}

    @if (session()->has('success'))
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>

        <script>
            swal("Pendaftaran Kegiatan berhasil Berhasil!", '', 'success');
        </script>

        <script>
            swal("Pendaftaran Berhasil!", "Silahkan tunggu beberapa waktu untuk mendapatkan informasi dari admin HMP-SI",
                'success');
        </script>
    @endif
@endsection
