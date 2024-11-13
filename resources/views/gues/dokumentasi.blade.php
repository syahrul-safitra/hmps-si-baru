@extends('gues.layouts.main')

@section('container')
    <div class="w-full dark:bg-gray-500">
        <div class="container flex flex-col flex-wrap content-center justify-center p-4 py-10 mx-auto md:p-10">
            <h1 class="text-5xl antialiased font-semibold leading-none text-center dark:text-gray-800">Dokumentasi</h1>
        </div>
    </div>

    <div class="container mx-auto bg-white">

        @if (count($dokumentasis) > 0)
            <section class="">
                <div class="container p-6 mx-auto space-y-8">
                    <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                        @foreach ($dokumentasis as $item)
                            <article class="flex flex-col dark:bg-gray-50">
                                <a rel="noopener noreferrer" href="{{ url($item->link_gdrive) }}"
                                    aria-label="Te nulla oportere reprimique his dolorum">
                                    <img alt="" class="object-cover w-full h-52 dark:bg-gray-500"
                                        src="{{ asset('berkas/' . $item->thumbnail) }}">
                                </a>
                                <div class="flex flex-col flex-1 p-6">
                                    <a rel="noopener noreferrer" href="#"
                                        aria-label="Te nulla oportere reprimique his dolorum"></a>
                                    <h3 class="flex-1 py-2 text-lg font-semibold leading-snug truncate">
                                        {{ $item->nama }}
                                    </h3>
                                    <p>{{ $item->keterangan }}</p>
                                    <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-600">
                                        <span>{{ date('d-m-Y', strtotime($item->tanggal)) }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <p class="text-center text-red-700 py-5">Not Found</p>
        @endif
    </div>
@endsection
