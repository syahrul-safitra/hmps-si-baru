@extends('gues.layouts.main')

@section('container')
    <div class="w-full dark:bg-gray-500">
        <div class="container flex flex-col flex-wrap content-center justify-center p-4 py-10 mx-auto md:p-10">
            <h1 class="text-5xl antialiased font-semibold leading-none text-center dark:text-gray-800">Promosi Kegiatan</h1>
            <form action="" method="GET" class="flex flex-row mt-5">
                <input type="text" placeholder="cari...." class="w-4/5 p-3 rounded-l-lg sm:w-4/5" name="search">
                <button type="submit"
                    class="w-1/5 p-3 font-semibold rounded-r-lg sm:w-1/5 dark:bg-violet-600 dark:text-gray-50"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="container mx-auto bg-white">

        @if (count($promokegiatans) > 0)
            <section class="">
                <div class="container p-6 mx-auto space-y-8">
                    <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                        @foreach ($promokegiatans as $item)
                            <article class="flex flex-col dark:bg-gray-50">
                                <a rel="noopener noreferrer" href="{{ url('lihatpromokegiatan/' . $item->id) }}"
                                    aria-label="Te nulla oportere reprimique his dolorum">
                                    <img alt="" class="object-cover w-full h-52 dark:bg-gray-500"
                                        src="{{ asset('berkas_kegiatan/' . $item->thumbnail) }}">
                                </a>
                                <div class="flex flex-col flex-1 p-6">
                                    <a rel="noopener noreferrer" href="#"
                                        aria-label="Te nulla oportere reprimique his dolorum"></a>
                                    <h3 class="flex-1 py-2 text-lg font-semibold leading-snug truncate">
                                        {{ $item->nama_kegiatan }}
                                    </h3>
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
