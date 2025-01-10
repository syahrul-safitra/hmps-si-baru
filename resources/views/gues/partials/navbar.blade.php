<div class="container mx-auto">

    <div class="navbar bg-base-100">
        <div class="navbar-start w-max">

            <div class="flex gap-3 items-center justify-center">

                <div class="avatar w-14 rounded">

                    <a href="{{ url('login') }}">

                        <img src="{{ asset('img/LOGO HMPS.png') }}" alt="LOGO HMP">

                    </a>
                </div>
                <div class="flex flex-col gap-0">
                    <a class="" style="width: 272px">HIMPUNAN MAHASISWA PRODI</a>
                    <a class="" style="width: 272px">PROGRAM STUDI SISTEM INFORMASI</a>
                </div>

            </div>
        </div>
        <div class="navbar-end w-full">
            <div class="dropdown dropdown-bottom dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="/">Beranda</a></li>
                    <li><a href="{{ url('profile') }}">Profil</a></li>
                    <li><a href="{{ url('struktur') }}">Struktur</a></li>
                    <li><a href="{{ url('/form_pendaftaran') }}">Pendaftaran</a></li>
                    <li><a href="">Promosi Kegiatan</a></li>
                    <li><a href="{{ url('/lihatberita') }}">Berita</a></li>
                    <li><a href="{{ url('/lihatdokumentasi') }}">Dokumentasi</a></li>
                    <li>
                        <div onclick="my_modal_1.showModal()">Dialog Prodi</div>
                    </li>
                </ul>
            </div>
            <ul class="menu menu-horizontal hidden lg:flex px-1">
                <li><a href="/">Beranda</a></li>
                <li><a href="{{ url('/profile') }}">Profil</a></li>
                <li><a href="{{ url('struktur') }}">Struktur</a></li>
                <li><a href="{{ url('/form_pendaftaran') }}">Pendaftaran</a></li>
                <li><a href="{{ url('/lihatpromokegiatan') }}">Kegiatan</a></li>
                <li><a href="{{ url('/lihatberita') }}">Berita</a></li>
                <li><a href="{{ url('/lihatdokumentasi') }}">Dokumentasi</a></li>
                <li>
                    <div onclick="my_modal_1.showModal()">Dialog Prodi</div>

                </li>
            </ul>
        </div>
    </div>

    <dialog id="my_modal_1" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold text-black">Kirim Dialog</h3>
            <div class="modal-action">
                <form method="post" class="w-full" action="{{ url('dialog') }}">
                    @csrf
                    <div class="flex flex-col gap-3 mb-3">
                        <input type="text" placeholder="Nama" name="nama"
                            class="input input-bordered w-full text-black" required />
                        <input type="text" placeholder="Angkatan" name="angkatan"
                            class="input input-bordered w-full text-black" required />
                        <input type="text" placeholder="Pesan" name="pesan"
                            class="input input-bordered w-full text-black" required />
                    </div>

                    <button class="btn" id="close-modal">Close</button>
                    <button class="btn">Kirim</button>
                </form>
            </div>
        </div>
    </dialog>
</div>

<script>
    const closeBtnModal = document.getElementById("close-modal");

    const modal = document.getElementById('my_modal_1');

    console.log(closeBtnModal)
    closeBtnModal.addEventListener('click', function(e) {
        e.preventDefault();
        modal.close();
    })
</script>
