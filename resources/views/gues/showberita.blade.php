@extends('gues.layouts.main')

@section('container')
    <div class="container mx-auto py-10">
        <div class="card bg-base-100 shadow-xl">
            <figure class="px-10">
                <img src="{{ asset('berkas/' . $berita->gambar) }}" alt="Shoes" class="w-full lg:w-4/5" class="rounded-xl" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">{{ $berita->judul }}</h2>
                <div class="card-actions justify-start">
                    <div class="badge badge-outline">{{ date('d-m-Y', strtotime($berita->tanggal)) }}</div>
                </div>
                <br>
                <div class="text-left">
                    {!! $berita->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
@endsection
