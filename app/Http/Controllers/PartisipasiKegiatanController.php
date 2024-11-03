<?php

namespace App\Http\Controllers;

use App\Models\PartisipasiKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PartisipasiKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('anggota.listkegiatan', [
            'kegiatans' => Kegiatan::with('partisipasiKegiatan')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PartisipasiKegiatan::create([
            'kegiatan_id' => $request->id_kegiatan,
            'anggota_id' => $request->id_anggota
        ]);

        return redirect('listkegiatan')->with('success', 'Berhasil mengikuti partisipasi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PartisipasiKegiatan $partisipasiKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartisipasiKegiatan $partisipasiKegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartisipasiKegiatan $partisipasiKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartisipasiKegiatan $partisipasiKegiatan)
    {
        //
    }

    public function absensi(Request $request, PartisipasiKegiatan $partisipasiKegiatan)
    {

        $partisipasiKegiatan->status = $request->presensi;
        $partisipasiKegiatan->save();

        return back()->with('success', 'Presensi berhasil!');
    }
}
