@extends('admin.layouts.main')

@section('container')
    <div class="card-body ">
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


        <h2 class="card-title">Kegiatan</h2>
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <tbody>
                    <tr>
                        <th scope="row" class="text-left" style="width: 30%;text-align: left;
                        ">
                            Nama
                            Kegiatan</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $kegiatan->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%;text-align: left; ">Waktu Mulai</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $kegiatan->tanggal_waktu_mulai }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%;text-align: left; ">Waktu Akhir</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $kegiatan->tanggal_waktu_akhir }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%;text-align: left; ">Tempat</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $kegiatan->tempat }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 30%;text-align: left; ">Deskripsi</th>
                        <td style="width: 5%">:</td>
                        <td style="width: 65%">{{ $kegiatan->deskripsi }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="card-body">
        <h2 class="card-title">Partisipasi Anggota</h2>
        <div class="overflow-x-auto">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th style="color:black">No</th>
                        <th style="color:black">Nama</th>
                        <th style="color:black">Status</th>
                        <th style="color:black">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kegiatan->partisipasiKegiatan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->anggota->nama_lengkap }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="flex gap-4">

                                    {{-- Presensi : --}}
                                    <button class="bg-green-400 p-1 rounded hover:bg-slate-500"
                                        onclick="modal_presensi{{ $item->id }}.showModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                                        </svg>
                                    </button>
                                    <dialog id="modal_presensi{{ $item->id }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-3xl">
                                            <h3 class="text-lg font-bold">Presensi
                                                {{ $item->judul }} !</h3>
                                            <div class="modal-action">
                                                <form method="post" action="{{ url('absensi/' . $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-control">
                                                        <label class="label cursor-pointer">
                                                            <span class="label-text">Hadir</span>
                                                            <input type="radio" name="presensi" value="hadir"
                                                                class="radio checked:bg-green-500" required
                                                                @if ($item->status == 'hadir') @checked(true) @endif />
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <label class="label cursor-pointer">
                                                            <span class="label-text">Izin</span>
                                                            <input type="radio" name="presensi" value="izin"
                                                                class="radio checked:bg-yellow-500" required
                                                                @if ($item->status == 'izin') @checked(true) @endif />
                                                        </label>
                                                    </div>
                                                    <div class="form-control">
                                                        <label class="label cursor-pointer">
                                                            <span class="label-text">Alpa</span>
                                                            <input type="radio" name="presensi" value="alpa"
                                                                class="radio checked:bg-red-500" required
                                                                @if ($item->status == 'alpa') @checked(true) @endif />
                                                        </label>
                                                    </div>
                                                    <button class="btn btn-success" type="submit">Simpan</button>
                                                    <div class="btn">ESC</div>
                                                </form>
                                            </div>
                                        </div>
                                    </dialog>


                                    <button class="bg-red-400 p-1 rounded hover:bg-slate-500"
                                        onclick="my_modal_4{{ $item->id }}.showModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                    <dialog id="my_modal_4{{ $item->id }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-3xl">
                                            <h3 class="text-lg font-bold">Anda akan menghapus data berita
                                                {{ $item->judul }} !</h3>
                                            <div class="modal-action">
                                                <form method="post" action="{{ url('berita/' . $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- if there is a button, it will close the modal -->
                                                    <button class="btn btn-error" type="submit">Hapus</button>
                                                    <div class="btn">ESC</div>
                                                </form>
                                            </div>
                                        </div>
                                    </dialog>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection
