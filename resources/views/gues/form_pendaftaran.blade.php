@extends('gues.layouts.main')

@section('container')
    <div class="container mx-auto py-5">
        <div class="card bg-base-100 w-full shadow-xl mx-auto">

            <div class="card-body">
                <h2 class="card-title mx-auto">Pendaftaran</h2>
            </div>

            <div class="card-body">
                <form action="{{ url('daftar') }}" method="post" enctype="multipart/form-data" class="w-full lg:w-4/5 mx-auto">

                    @csrf
                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Nama Lengkap</span>
                        </div>
                        <input type="text" placeholder="Type here" name="nama_lengkap" value="{{ @old('nama_lengkap') }}"
                            class="input input-bordered w-full @error('nama_lengkap') input-error @enderror" />
                        @error('nama_lengkap')
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

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Slip UKT</span>
                        </div>
                        <input type="file" name="file_ukt"
                            class="file-input file-input-bordered file-input-info w-full max-w-xs"
                            accept=".png, .jpg, .jpeg, .pdf" />

                        @error('file_ukt')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Lampiran KTM</span>
                        </div>
                        <input type="file" name="file_ktm"
                            class="file-input file-input-bordered file-input-info w-full max-w-xs"
                            accept=".png, .jpg, .jpegm .pdf" />

                        @error('file_ktm')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Lampiran Surat Pernyataan</span>
                        </div>
                        <input type="file" name="file_srt_penyataan"
                            class="file-input file-input-bordered file-input-info w-full max-w-xs"
                            accept=".png, .jpg, .jpeg, .pdf" />

                        @error('file_srt_penyataan')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Lampiran CV</span>
                        </div>
                        <input type="file" name="file_cv"
                            class="file-input file-input-bordered file-input-info w-full max-w-xs"
                            accept=".png, .jpg, .jpeg, .pdf" />

                        @error('file_cv')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>


                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Screenshoot Follow Instagram</span>
                        </div>
                        <input type="file" name="file_ss_instagram"
                            class="file-input file-input-bordered file-input-info w-full max-w-xs"
                            accept=".png, .jpg, .jpeg, .pdf" />

                        @error('file_ss_instagram')
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
            swal("Pendaftaran Berhasil!", "Silahkan tunggu beberapa waktu untuk mendapatkan informasi dari admin HMP-SI",
                'success');
        </script>
    @endif
@endsection
