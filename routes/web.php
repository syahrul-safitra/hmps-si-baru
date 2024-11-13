<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PartisipasiKegiatanController;
use App\Http\Controllers\PartisipasiKegiatanPromosiController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PromosiKegiatanController;

use App\Models\PromosiKegiatan;
use App\Models\Galery;
use App\Models\Berita;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendEmail;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/kirim', function () {
    $data = [
        'name' => 'Syahrul',
        'body' => 'Testing Kirim Email di syahul'
    ];
    Mail::to('syahrulsafitra7@gmail.com')->send(new SendEmail($data));
    return 'berhasil!';
});

Route::get('/', function () {
    return view('gues.index', [
        'galery' => Galery::first(),
        'beritas' => Berita::latest()->limit(4)->get()
    ]);
})->middleware('tamu');

Route::get('dashboard', [BeritaController::class, 'dashboard'])->middleware('auth:user');

Route::get('profile', function () {
    return view('gues.profile', [
        'galery' => Galery::first()
    ]);
});

Route::get('struktur', function () {
    return view('gues.struktur', [
        'galery' => Galery::first(),
    ]);
});

Route::get('/lihatberita', function () {

    return view('gues.berita', [
        'beritas' => Berita::Filter(request('search'))->latest()->get()
    ]);
});

Route::get('lihatpromokegiatan', function () {

    return view('gues.promokegiatan', [
        'promokegiatans' => PromosiKegiatan::with('partisipasiPromoKegiatan')->filter(request('search'))->latest()->get()
    ]);
});

Route::resource('pendaftaran', PendaftaranController::class)->middleware(['auth:user']);
Route::get('screening', [PendaftaranController::class, 'screening'])->middleware(['auth:user']);


// Route::get('/dashboard', function () {
//     return view('admin.layouts.main');
// })->middleware('auth')->middleware(['auth']);

Route::resource('/berita', BeritaController::class)->middleware(['auth:user']);

Route::get('/login', [LoginController::class, 'login'])->middleware('tamu')->name('login');
Route::post('/login', [LoginController::class, 'authentication'])->middleware('tamu')->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/form_pendaftaran', function () {
    return view('gues.form_pendaftaran');
});

Route::post('lolos_berkas/{pendaftaran}', [PendaftaranController::class, 'lolos_berkas'])->middleware(['auth:user']);
Route::post('tidak_lolos_berkas/{pendaftaran}', [PendaftaranController::class, 'tidak_lolos_berkas'])->middleware(['auth:user']);
Route::post('ditolak/{pendaftaran}', [PendaftaranController::class, 'ditolak'])->middleware(['auth:user']);
Route::post('diterima/{pendaftaran}', [PendaftaranController::class, 'diterima'])->middleware(['auth:user']);

Route::post('/daftar', [PendaftaranController::class, 'store']);

Route::resource('anggota', AnggotaController::class)->middleware(['auth:user']);

// Route::resource('listkegiatan', PartisipasiKegiatanController::class)->middleware(['auth:anggota']);
Route::resource('listkegiatan', PartisipasiKegiatanController::class);

Route::get('/showpartisipasi/{promokegiatan}', [PromosiKegiatanController::class, 'showPartisipasi'])->middleware(['auth:user']);
Route::post('absensi/{kode}', [PromosiKegiatanController::class, 'absensi'])->middleware(['auth:user']);
Route::resource('/promokegiatan', PromosiKegiatanController::class)->middleware(['auth:user']);
Route::post('partisipasi/{kode}', [PromosiKegiatanController::class, 'delete'])->middleware('auth:user');

Route::resource('dokumentasi', DokumentasiController::class)->middleware(['auth:user']);

Route::get('lihatberita/{beritum}', [BeritaController::class, 'lihatBerita'])->middleware('guest');
Route::get('lihatpromokegiatan/{promokegiatan}', [PromosiKegiatanController::class, 'lihatpromokegiatan'])->middleware(['guest']);
Route::get('lihatdokumentasi', [DokumentasiController::class, 'lihat'])->middleware(['guest']);
Route::get('passwordadmin', [AnggotaController::class, 'passwordAdmin'])->middleware(['auth:user']);
Route::post('passwordadmin', [AnggotaController::class, 'ubahPwAdmin'])->middleware(['auth:user']);

Route::get('editgalery', [GaleryController::class, 'index'])->middleware(['auth:user']);
Route::post('galery', [GaleryController::class, 'update'])->middleware(['auth:user']);

Route::get('/test1', function () {
    return Auth::guard('user')->check();
});
Route::get('/test2', function () {
    return Auth::guard('anggota')->check();
});

Route::get('daftar-partisipasi/{promokegiatan}', [PartisipasiKegiatanPromosiController::class, 'daftar'])->middleware('guest');
Route::post('daftar-partisipasi', [PartisipasiKegiatanPromosiController::class, 'store'])->middleware('guest');

Route::resource('pengurus', PengurusController::class)->middleware('auth:user');