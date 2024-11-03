@extends('admin.layouts.main')

@section('container')
    <div class="card-body">

        @if (session()->has('success'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif


        <h2 class="card-title mx-auto">Edit galery</h2>

        <form action="{{ url('galery') }}" method="post" class="w-2/3 mx-auto" enctype="multipart/form-data">
            @csrf
            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Banner 1 <span class="text-red-500">(Disarankan ukuran w-1290 &
                            h-325)</span></span>
                </div>
                <input type="file" id="inputBanner1" onchange="previewBanner1()" name="banner1"
                    class="file-input file-input-bordered file-input-info w-full max-w-xs" accept=".png, .jpg, .jpeg" />

                <img class="w-64 rounded mt-4" id="img-banner1" src="{{ asset('img/' . $galery->banner1) }}">
                @error('banner1')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Banner 2 <span class="text-red-500">(Disarankan ukuran w-1290 &
                            h-325)</span></span>
                </div>
                <input type="file" id="inputBanner2" onchange="previewBanner2()" name="banner2"
                    class="file-input file-input-bordered file-input-info w-full max-w-xs" accept=".png, .jpg, .jpeg" />

                <img class="w-64 rounded mt-4" id="img-banner2" src="{{ asset('img/' . $galery->banner2) }}">
                @error('banner2')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Banner 3 <span class="text-red-500">(Disarankan ukuran w-1290 &
                            h-325)</span></span>
                </div>
                <input type="file" id="inputBanner3" onchange="previewBanner3()" name="banner3"
                    class="file-input file-input-bordered file-input-info w-full max-w-xs" accept=".png, .jpg, .jpeg" />

                <img class="w-64 rounded mt-4" id="img-banner3" src="{{ asset('img/' . $galery->banner3) }}">
                @error('banner3')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Profile <span class="text-red-500">(Disarankan ukuran w-548 &
                            h-928)</span></span>
                </div>
                <input type="file" id="inputProfile" onchange="previewProfile()" name="profile"
                    class="file-input file-input-bordered file-input-info w-full max-w-xs" accept=".png, .jpg, .jpeg" />

                <img class="w-64 rounded mt-4" id="img-profile" src="{{ asset('img/' . $galery->profile) }}">
                @error('profile')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Stuktur</span>
                </div>
                <input type="file" id="inputStruktur" onchange="previewStruktur()" name="struktur"
                    class="file-input file-input-bordered file-input-info w-full max-w-xs" accept=".png, .jpg, .jpeg" />

                <img class="w-64 rounded mt-4" id="img-struktur" src="{{ asset('img/' . $galery->struktur) }}">
                @error('struktur')
                    <div class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <div class="flex mt-4 gap-4">
                <a class="btn btn-primary" href="{{ url('dashboard') }}">Batal</a>
                <button class="btn btn-info">Simpan</button>
            </div>

        </form>
    </div>
@endsection
