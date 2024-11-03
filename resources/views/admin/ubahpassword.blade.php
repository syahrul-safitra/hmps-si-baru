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


        <h2 class="card-title mx-auto">Edit Password Admin</h2>

        <form action="{{ url('passwordadmin') }}" method="post" class="w-2/3 mx-auto" enctype="multipart/form-data">
            @csrf
            <label class="form-control w-full ">
                <div class="label">
                    <span class="label-text">Masukan Password Baru</span>
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
                <a class="btn btn-primary" href="{{ url('dashboard') }}">Batal</a>
                <button class="btn btn-info">Simpan</button>
            </div>
        </form>
    </div>
@endsection
