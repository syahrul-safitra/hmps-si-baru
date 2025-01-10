@extends('gues.layouts.main')

@section('container')
    <div class="container mx-auto my-5">

        <div class="card bg-base-100 shadow-xl">
            <a class="px-10 pt-10" href="{{ asset('img/' . $galery->profile) }}">
                <img src="{{ asset('img/' . $galery->profile) }}" alt="Shoes" class="rounded-xl" />
            </a>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Gambaran Umum HMPS SI UIN STS Jambi</h2>
                <p>Himpunan Mahasiswa Program Studi Sistem Informasi yang berada di
                    Universitas Islam Negeri Sulthan Thaha Saifuddin Jambi merupakan sebuah
                    organisasi yang beranggotakan mahasiswa dari program studi Sistem Informasi
                    yang didirikan pada tanggal 31 Maret 2020. Himpunan Mahasiswa Program
                    Studi Sistem Informasi sering mengadakan kegiatan seperti seminar, acara
                    sosial, atau kegiatan bersama yang berkaitan dengan program studi Sistem
                    Informasi. Himpunan Mahasiswa Program Studi Sistem Informasi juga menjadi
                    penghubung antara mahasiswa dan pihak fakultas atau universitas untuk
                    menyampaikan aspirasi dan kebutuhan mahasiswa. Organisasi Himpunan
                    Mahasiswa Program Studi Sistem Informasi ini memiliki vis, misi, dan struktur
                    organisasi, yaitu sebagai berikut:</p>
            </div>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Visi</h2>
                <p>Menjadikan Himpunan Mahasiswa Program Studi Sistem Informasi
                    sebagai wadah pemersatu yang kreatif, kompetitif, bertanggung jawab,
                    serta penampung aspirasi dan penyalur bakat mahasiswa program studi
                    sistem informasi sehingga terwujudnya himpunan yang solid dan
                    bersinergi.</p>
            </div>
            <div class="card-body items-center text-center">
                <h2 class="card-title">Misi</h2>
                <ul class="text-left">
                    <li>1. Menjadikan wadah penyalur bakat setiap mahasiswa prodi sistem
                        informasi. Demi terwujudnya lokomotif perubahan yang unggul
                        dibidang teknologi baik dilingkup kampus maupun masyarakat.
                    </li>
                    <li>2. Melanjutkan kegiatan yang mendukung tercapainya mahasiswa yang
                        aktif, memiliki solidaritas, berwawasan, dan keterampilan yang
                        kompeten.
                    </li>
                    <li>3. Menjalin hubungan baik dengan civitas, alumni, serta organisasi atau
                        lembaga lainnya baik di lingkup UIN STS JAMBI ataupun diluar.
                    </li>
                    <li>4. Menanamkan sikap disiplin dan bertanggung jawab dalam
                        berorganisasi kepada setiap anggota HMPS-SI
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
