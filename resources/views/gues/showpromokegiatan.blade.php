@extends('gues.layouts.main')

@section('container')
    <div class="container mx-auto py-10">
        <div class="card bg-base-100 shadow-xl">
            <figure class="px-10">
                <img src="{{ asset('berkas_kegiatan/' . $promokegiatan->thumbnail) }}" alt="Shoes" class="w-full lg:w-4/5"
                    class="rounded-xl" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">{{ $promokegiatan->nama_kegiatan }}</h2>
                <div class="card-actions justify-start">
                    <div class="badge badge-outline">{{ date('d-m-Y', strtotime($promokegiatan->tanggal)) }}</div>
                </div>
                <div class="card-actions justify-start">
                    <div class="badge badge-outline"><a href="{{ url('daftar-partisipasi/' . $promokegiatan->id) }}">
                            Daftar
                        </a>
                    </div>
                </div>
                <br>
                <div class="text-left">
                    {!! $promokegiatan->deskripsi !!}
                </div>

            </div>
        </div>
    </div>
@endsection
