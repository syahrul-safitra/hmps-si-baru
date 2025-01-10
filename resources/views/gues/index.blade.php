@extends('gues.layouts.main')

@section('container')
    <div class="carousel w-full">
        <!-- Slide 1 -->
        <div class="carousel-item opacity-100 z-10">
            <img src="{{ asset('img/' . $galery->banner1) }}" class="w-full" />
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide3" class="btn btn-circle" data-slide="3">❮</a>
                <a href="#slide2" class="btn btn-circle" data-slide="2">❯</a>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item opacity-0 z-0">
            <img src="{{ asset('img/' . $galery->banner2) }}" class="w-full" />
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide1" class="btn btn-circle" data-slide="1">❮</a>
                <a href="#slide3" class="btn btn-circle" data-slide="3">❯</a>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item opacity-0 z-0">
            <img src="{{ asset('img/' . $galery->banner3) }}" class="w-full" />
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide2" class="btn btn-circle" data-slide="2">❮</a>
                <a href="#slide1" class="btn btn-circle" data-slide="1">❯</a>
            </div>
        </div>
    </div>

    <div class="hero bg-base-200" style="height: 380px">
        <div class="hero-content text-center">
            <div class="max-w-md">

                <div class="avatar w-32 rounded">
                    <img src="{{ asset('img/LOGO HMPS.png') }}" alt="LOGO HMP">
                </div>

                <h1 class="text-3xl font-bold mt-4">Sambutan</h1>

                <p class="py-6">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
            </div>
        </div>
    </div>

    {{-- <section class="p-6 dark:bg-gray-100 dark:text-gray-800">
        <div class="container p-4 mx-auto text-center">
            <h2 class="text-4xl font-bold">Social Media</h2>
        </div>
        <div class="container flex flex-wrap justify-center mx-auto dark:text-gray-600">
            <div class="flex justify-center w-1/2 p-6 align-middle md:w-1/3 xl:w-1/4">
                <div class="avatar">
                    <div class="ring-primary ring-offset-base-100 w-24 rounded-full ring ring-offset-2">
                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
            </div>
            <div class="flex justify-center w-1/2 p-6 align-middle md:w-1/3 xl:w-1/4">
                <div class="avatar">
                    <div class="ring-primary ring-offset-base-100 w-24 rounded-full ring ring-offset-2">
                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
            </div>
            <div class="flex justify-center w-1/2 p-6 align-middle md:w-1/3 xl:w-1/4">
                <div class="avatar">
                    <div class="ring-primary ring-offset-base-100 w-24 rounded-full ring ring-offset-2">
                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
            </div>
            <div class="flex justify-center w-1/2 p-6 align-middle md:w-1/3 xl:w-1/4">
                <div class="avatar">
                    <div class="ring-primary ring-offset-base-100 w-24 rounded-full ring ring-offset-2">
                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section class="py-6 sm:py-12 dark:bg-gray-100 dark:text-gray-800">
        <div class="container p-6 mx-auto space-y-8">
            <div class="space-y-2 text-center">
                <h2 class="text-3xl font-bold">Berita</h2>
            </div>
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">

                @foreach ($beritas as $item)
                    <article class="flex flex-col dark:bg-gray-50">
                        <a rel="noopener noreferrer" href="{{ url('lihatberita/' . $item->id) }}"
                            aria-label="Te nulla oportere reprimique his dolorum">
                            <img alt="" class="object-cover w-full h-52 dark:bg-gray-500"
                                src="{{ asset('berkas/' . $item->gambar) }}">
                        </a>
                        <div class="flex flex-col flex-1 p-6">
                            <a rel="noopener noreferrer" href="#"
                                aria-label="Te nulla oportere reprimique his dolorum"></a>
                            <h3 class="flex-1 py-2 text-lg font-semibold leading-snug">{{ $item->judul }}
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
@endsection


<!-- animasi -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slides = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        const updateSlide = (index) => {
            slides.forEach((slide, i) => {
                if (i === index) {
                    // Slide aktif: tampilkan dengan fade-in
                    slide.classList.add('opacity-100', 'z-10');
                    slide.classList.remove('opacity-0', 'z-0', 'hidden');
                } else {
                    // Slide tidak aktif: sembunyikan dengan fade-out
                    slide.classList.add('opacity-0', 'z-0');
                    slide.classList.remove('opacity-100', 'z-10');
                }
            });
        };

        // Otomatis geser setiap 5 detik
        setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlide(currentIndex);
        }, 5000);

        // Navigasi manual dengan tombol
        const buttons = document.querySelectorAll('.btn-circle');
        buttons.forEach((button) => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                currentIndex = parseInt(button.getAttribute('data-slide')) - 1;
                updateSlide(currentIndex);
            });
        });

        // Tampilkan slide pertama saat dimuat
        updateSlide(currentIndex);
    });
</script>

<style>
    /* CSS untuk carousel */
    .carousel {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 400px;
    }

    .carousel-item {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        z-index: 0;
        transition: opacity 1s ease-in-out;
        /* Transisi fade */
    }

    .carousel-item.opacity-100 {
        opacity: 1;
        /* Slide aktif terlihat */
    }

    .carousel-item.z-10 {
        z-index: 10;
        /* Slide aktif di atas */
    }

    @media (max-width: 768px) {
        .carousel {
            height: 200px;
            /* Ubah tinggi menjadi 300px untuk tampilan mobile */
        }
    }
</style>
