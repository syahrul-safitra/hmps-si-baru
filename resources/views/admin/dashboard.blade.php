@extends('admin.layouts.main')

@section('container')
    <div class="card-body">

        <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Pendaftaran </h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">{{ $pendaftaran }}</button>
                    </div>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Anggota Keseluruhan</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">{{ $anggota }}</button>
                    </div>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Kegiatan</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">{{ $kegiatan }}</button>
                    </div>
                </div>
            </div>
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Berita</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">{{ $berita }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
