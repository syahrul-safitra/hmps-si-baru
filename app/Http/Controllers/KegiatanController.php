<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Rules\CheckWaktuKegiatanMinimal;
use App\Rules\CheckWaktuAkhirKegiatanMinimal;
use App\Rules\CheckUpdateWaktuTumpangTindih;
use App\Rules\CheckWaktuTumpangTindih;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kegiatan.index', [
            'kegiatans' => Kegiatan::with('partisipasiKegiatan')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $waktu_mulai = $request->tanggal_waktu_mulai;

        $validated = $request->validate([
            'nama_kegiatan' => 'required|max:100',
            'tanggal_waktu_mulai' => ['required', new CheckWaktuKegiatanMinimal, new CheckWaktuTumpangTindih],
            'tanggal_waktu_akhir' => ['required', new CheckWaktuAkhirKegiatanMinimal($waktu_mulai), new CheckWaktuTumpangTindih],
            'tempat' => 'required',
            'deskripsi' => 'required|max:200',
            'thumbnail' => 'required|max:1500'
        ]);

        $thumb = $request->file('thumbnail');

        $rename = uniqid() . '_' . $thumb->getClientOriginalName();

        $validated['thumbnail'] = $rename;

        $tempat_berkas = 'berkas';

        $thumb->move($tempat_berkas, $rename);

        Kegiatan::create($validated);

        return redirect('kegiatan')->with('success', 'Kegiatan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {

        return view('admin.kegiatan.edit', [
            'kegiatan' => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {

        $waktu_mulai = $request->tanggal_waktu_mulai;

        $validated = $request->validate([
            'nama_kegiatan' => 'required|max:100',
            'tanggal_waktu_mulai' => ['required', new CheckWaktuKegiatanMinimal, new CheckUpdateWaktuTumpangTindih($kegiatan->id)],
            'tanggal_waktu_akhir' => ['required', new CheckWaktuAkhirKegiatanMinimal($waktu_mulai), new CheckUpdateWaktuTumpangTindih($kegiatan->id)],
            'tempat' => 'required',
            'deskripsi' => 'required|max:200',
            'thumbnail' => 'max:1500'
        ]);

        if ($request->file('thumbnail')) {
            $thumb = $request->file('thumbnail');

            $rename = uniqid() . '_' . $thumb->getClientOriginalName();

            $validated['thumbnail'] = $rename;

            $tempat_berkas = 'berkas';

            $thumb->move($tempat_berkas, $rename);

        }

        Kegiatan::findOrFail($kegiatan->id)->update($validated);

        return redirect('kegiatan')->with('success', 'Kegiatan berhasil di rubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }

    public function listkegiatan()
    {
        return view('anggota.listkegiatan');
    }

    public function showPartisipasi(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.partisipasi', [
            'kegiatan' => $kegiatan->load('partisipasiKegiatan.anggota')
        ]);
    }
}
