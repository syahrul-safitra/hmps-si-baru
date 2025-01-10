@extends('gues.layouts.main')

@section('container')
    <section class="py-6 sm:py-12  dark:text-gray-800">
        <div class="container p-6 mx-auto space-y-8">
            <div class="space-y-2 text-center">
                <h2 class="text-3xl font-bold">Dialog Prodi</h2>
            </div>
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-5">

                @foreach ($dialogs as $item)
                    <div class="card bg-black image-full shadow-xl">
                        {{-- <figure>
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                            alt="Shoes" />
                    </figure> --}}
                        <div class="card-body bg-slate-50  ">
                            <h2 class="card-title text-black">{{ $item->nama }}</h2>
                            <p class="text-black">{{ $item->pesan }}</p>
                            <div class="card-actions justify-end">
                                @if ($item->status == 'diterima')
                                    <div class="badge badge-info">{{ $item->status }}</div>
                                @elseif ($item->status == 'diproses')
                                    <div class="badge badge-warning">{{ $item->status }}</div>
                                @else
                                    <div class="badge badge-success">{{ $item->status }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            {{ $dialogs->links() }}
        </div>
    </section>
@endsection
