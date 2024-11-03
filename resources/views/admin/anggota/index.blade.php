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

        <h2 class="card-title">Anggota</h2>
        {{-- <h2 class="card-title"><a class="btn btn-primary my-3" href="{{ url('berita/create') }}">Tambah</a></h2> --}}
        <div class="overflow-x-auto">
            <table class="table" id="example">
                <!-- head -->
                <thead>
                    <tr>
                        <th style="color:black">No</th>
                        <th style="color:black">Nama</th>
                        <th style="color:black">Email</th>
                        <th style="color:black">NIM</th>
                        <th style="color:black">Tahun</th>
                        <th style="color:black">No WA</th>
                        <th style="color:black">Semester</th>
                        <th style="color:black">Kelas</th>
                        <th style="color:black" class="text-center">KTM</th>
                        <th style="color:black" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggotas as $item)
                        <!-- row 1 -->
                        <tr>
                            <th>
                                {{ $loop->iteration }}
                            </th>
                            <td>
                                {{ $item->nama_lengkap }}
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->nim }}
                            </td>
                            <td>
                                {{ $item->tahun }}
                            </td>
                            <td>
                                {{ $item->no_wa }}
                            </td>
                            <td>
                                {{ $item->semester }}
                            </td>
                            <td>
                                {{ $item->kelas }}
                            </td>
                            <td>
                                <div class="flex gap-4">

                                    <a href="{{ asset('berkas_anggota/' . $item->file_ktm) }}"
                                        class="bg-yellow-400 p-1 rounded hover:bg-slate-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>

                                    </a>
                                </div>

                            </td>

                            <td>
                                <div class="flex gap-4">
                                    <a href="{{ url('anggota/' . $item->id . '/edit') }}"
                                        class="bg-yellow-500 p-1 rounded hover:bg-slate-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>

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
                                            <h3 class="text-lg font-bold">Anda akan menghapus data anggota!
                                                {{ $item->judul }} !</h3>
                                            <div class="modal-action">
                                                <form method="post" action="{{ url('anggota/' . $item->id) }}"
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
