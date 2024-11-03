<?php

namespace App\Http\Controllers;

use App\Models\PromosiKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PromosiKegiatanController extends Controller
{

    protected $location = 'berkas_kegiatan';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.promokegiatan.index', [
            'promoKegiatans' => PromosiKegiatan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promokegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|max:100',
            'tanggal' => 'required',
            'tempat' => 'required|max:100',
            'deskripsi' => 'required',
            'thumbnail' => 'required|image|max:1000'
        ]);

        $thumb = $request->file("thumbnail");

        $rename = uniqid() . '_' . $thumb->getClientOriginalName();

        $validated['thumbnail'] = $rename;

        $location = 'berkas_kegiatan';
        $thumb->move($location, $rename);

        PromosiKegiatan::create($validated);

        return redirect('promokegiatan')->with('success', 'Berhasil menambahkan Promosi Kegiatan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PromosiKegiatan $promokegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromosiKegiatan $promokegiatan)
    {
        return view('admin.promokegiatan.edit', [
            'promoKegiatan' => $promokegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PromosiKegiatan $promokegiatan)
    {

        $validated = $request->validate([
            'nama_kegiatan' => 'required|max:100',
            'tanggal' => 'required',
            'tempat' => 'required|max:100',
            'deskripsi' => 'required',
            'thumbnail' => 'image|max:1000'
        ]);

        if ($request->file('thumbnail')) {
            $thumb = $request->file('thumbnail');

            $rename = uniqid() . '_' . $thumb->getClientOriginalName();

            $validated['thumbnail'] = $rename;

            $location = 'berkas_kegiatan';

            File::delete($location . '/' . $promokegiatan->thumbnail);
            $thumb->move($location, $rename);
        }

        $promokegiatan->update($validated);

        return redirect('promokegiatan')->with('success', 'Berhasil merubah data promo kegiatan!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromosiKegiatan $promokegiatan)
    {
        $location = 'berkas_kegiatan';
        File::delete($location . '/' . $promokegiatan->thumbnail);

        $promokegiatan->delete();
        return redirect('promokegiatan')->with('success', 'Berhasil menghapus data promo kegiatan!');
    }

    public function lihatpromokegiatan(PromosiKegiatan $promokegiatan)
    {
        return view('gues.showpromokegiatan', [
            'promokegiatan' => $promokegiatan
        ]);
    }
}
