<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.dokumentasi.index', [
            'dokumentasis' => Dokumentasi::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dokumentasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:100',
            'tanggal' => 'required',
            'keterangan' => 'required|max:150',
            'link_gdrive' => 'required',
            'thumbnail' => 'required|max:1200'
        ]);

        $file = $request->file('thumbnail');

        $rename = uniqid() . '_' . $file->getClientOriginalName();

        $validated['thumbnail'] = $rename;
        $file->move('berkas', $rename);

        Dokumentasi::create($validated);

        return redirect('dokumentasi')->with('success', 'Dokumentasi berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumentasi $dokumentasi)
    {
        return view('admin.dokumentasi.edit', [
            'dokumentasi' => $dokumentasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $validated = $request->validate([
            'nama' => 'required|max:100',
            'tanggal' => 'required',
            'keterangan' => 'required|max:150',
            'link_gdrive' => 'required',
            'thumbnail' => 'max:1200'
        ]);

        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');

            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $validated['thumbnail'] = $rename;
            $file->move('berkas', $rename);

            File::delete('berkas/' . $dokumentasi->thumbnail);

        }

        $dokumentasi->update($validated);

        return redirect('dokumentasi')->with('success', 'Dokumentasi berhasil ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumentasi $dokumentasi)
    {
        File::delete('berkas/' . $dokumentasi->thumbnail);
        $dokumentasi->delete();

        return redirect('dokumentasi')->with('success', 'Dokumentasi berhasil dihapus!');
    }

    public function lihat()
    {
        return view('gues.dokumentasi', [
            'dokumentasis' => Dokumentasi::latest()->get()
        ]);
    }
}
