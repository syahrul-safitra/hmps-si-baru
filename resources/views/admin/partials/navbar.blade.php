<div>
    <div class="navbar bg-base-100 p-5">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">

                    <!-- Page content here -->
                    <label for="my-drawer" class="btn btn-primary drawer-button"><svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" for="my-drawer"
                            class="drawer-button">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </label>
                </div>
            </div>
        </div>

        <div class="navbar-center">
            <a class="btn btn-ghost text-xl">{{ Auth::guard('user')->user()->name }}</a>
            {{-- <a class="btn btn-ghost text-xl">{{ Auth::guard('anggota')->user()->nama_lengkap }}</a> --}}
        </div>

        <div class="navbar-end">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button">
                    <div class="avatar">
                        <div class="ring-primary ring-offset-base-100 w-10 rounded-full ring ring-offset-2">
                            <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                        </div>
                    </div>
                </div>

                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">

                    {{-- <li class="text-red-500"><a>Logout</a></li> --}}

                    <form action="{{ url('logout') }}" method="post">
                        @csrf
                        <li><button type="submit" class="text-red-500">Logout</button></li>
                    </form>
                </ul>
            </div>
        </div>
    </div>

    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
            {{-- <label for="my-drawer" class="btn btn-primary drawer-button">Open drawer</label> --}}
        </div>
        <div class="drawer-side z-50">
            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                <!-- Sidebar content here -->
                {{-- @can('isAdmin') --}}
                <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ url('berita') }}">Berita</a></li>
                <li>
                    <div class="dropdown dropdown-bottom">
                        <div tabindex="0" m-1">Pendaftaran</div>
                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                            <li><a href="{{ url('pendaftaran') }}">Di Proses</a></li>
                            <li><a href="{{ url('screening') }}">Lolos Screening</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{ url('anggota') }}">Anggota</a></li>
                {{-- <li><a href="{{ url('kegiatan') }}">Kegiatan</a></li> --}}
                <li><a href="{{ url('promokegiatan') }}">Promosi Kegiatan</a></li>
                <li><a href="{{ url('dokumentasi') }}">Dokumentasi</a></li>
                <li><a href="{{ url('editgalery') }}">Galery</a></li>
                @if (Auth::guard('user')->user()->role == 'admin')
                    <li><a href="{{ url('pengurus') }}">Pengurus</a></li>
                    <li><a href="{{ url('passwordadmin') }}">Password Admin</a></li>
                @endif
                {{-- @endcan --}}

            </ul>
        </div>
    </div>
</div>
