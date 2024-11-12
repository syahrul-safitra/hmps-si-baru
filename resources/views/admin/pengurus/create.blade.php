@extends('admin.layouts.main')

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
                <h2 class="card-title mx-auto">Tambah Pengurus</h2>
            </div>

            <div class="card-body">
                <form action="{{ url('pengurus') }}" method="post" class="w-full lg:w-4/5 mx-auto">
                    @csrf

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Nama</span>
                        </div>
                        <input type="text" placeholder="Type here" name="name" value="{{ @old('name') }}"
                            class="input input-bordered w-full @error('name') input-error @enderror" />
                        @error('name')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input type="email" placeholder="Type here" name="email" value="{{ @old('email') }}"
                            class="input input-bordered w-full @error('email') input-error @enderror" />
                        @error('email')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <label class="form-control w-full ">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input type="text" placeholder="Type here" name="password" value="{{ @old('password') }}"
                            class="input input-bordered w-full @error('password') input-error @enderror" />
                        @error('password')
                            <div class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>

                    <div class="flex mt-4 gap-4">
                        <a class="btn btn-primary" href="{{ url('pengurus') }}">Kembali</a>
                        <button class="btn btn-info">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Notification --}}
@endsection
