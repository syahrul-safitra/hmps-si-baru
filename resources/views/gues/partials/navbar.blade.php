<div class="container mx-auto">

    <div class="navbar bg-base-100">
        <div class="navbar-start">

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
        <div class="navbar-end">
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
            </ul>
        </div>
    </div>
</div>
