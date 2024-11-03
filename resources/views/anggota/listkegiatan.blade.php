@extends('anggota.layouts.main')

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

        <h2 class="card-title">List Kegiatan</h2>
        <div class="overflow-x-auto">
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($kegiatans as $item)
                    @php
                        $countPartisipasi = 0;
                        $sudahMengikuti = false;

                        $check = false;
                        if ($item->partisipasiKegiatan->count() > 0) {
                            $countPartisipasi = $item->partisipasiKegiatan->count();
                            $check = $item->partisipasiKegiatan->where(
                                'anggota_id',
                                Auth::guard('anggota')->user()->id,
                            );

                            if ($check) {
                                $sudahMengikuti = true;
                            }
                        }

                        // dd($sudahMengikuti);

                    @endphp
                    <div class="card bg-base-100 shadow-xl">
                        <figure>
                            <img src="{{ asset('berkas/' . $item->thumbnail) }}" alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->nama_kegiatan }}</h2>
                            {{-- <p>{{ $item->deskripsi }}</p> --}}
                            <p class="truncate">{{ $item->deskripsi }}
                            </p>
                            <div class="card-actions justify-end">
                                <!-- The button to open modal -->
                                <label for="my_modal_{{ $item->id }}" class="btn">Full Desc</label>

                                @if (!$sudahMengikuti)
                                    <form action="{{ url('listkegiatan') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_anggota"
                                            value="{{ Auth::guard('anggota')->user()->id }}">
                                        <input type="hidden" name="id_kegiatan" value="{{ $item->id }}">
                                        <button class="btn btn-primary btn-ikut-partisipasi">Ikut</button>
                                    </form>
                                @endif
                            </div>
                            <div class="card-actions justify-end">
                                @if ($sudahMengikuti)
                                    <div class="badge badge-primary">Anda sudah mengikuti</div>
                                @else
                                    <div class="badge badge-ghost">Anda belum mengikuti</div>
                                @endif
                                <div class="badge badge-outline">Anggota yang mengikuti : {{ $countPartisipasi }}</div>
                            </div>
                        </div>
                    </div>



                    <!-- Put this part before </body> tag -->
                    <input type="checkbox" id="my_modal_{{ $item->id }}" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Deskripsi Lengkap</h3>
                            <p class="py-4">{{ $item->deskripsi }}</p>
                        </div>
                        <label class="modal-backdrop" for="my_modal_{{ $item->id }}">Close</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
