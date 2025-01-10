@extends('gues.layouts.main')

@section('container')
    <div class="container mx-auto my-5">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Struktur</h2>
            </div>
            <div class="card-body items-center text-center">
                <a class="px-10 pt-10" href="{{ asset('img/' . $galery->struktur) }}">
                    <img src="{{ asset('img/' . $galery->struktur) }}" alt="Shoes" class="rounded-xl" />
                </a>
            </div>
        </div>
    </div>
@endsection
