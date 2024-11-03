<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Pendaftaran;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.berita.index', [
            'beritas' => Berita::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255|',
            'tanggal' => 'required|date',
            'gambar' => 'required|max:2000',
            'deskripsi' => 'required'
        ]);

        $file = $request->file('gambar');

        $renameFile = uniqid() . '_' . $file->getClientOriginalName();
        $folderLocation = 'berkas';

        $file->move($folderLocation, $renameFile);

        $validated['gambar'] = $renameFile;

        Berita::create($validated);

        return redirect('berita')->with('success', 'Berita berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {

        return view('admin.berita.edit', [
            'berita' => $beritum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255|',
            'tanggal' => 'required|date',
            'gambar' => 'max:2000',
            'deskripsi' => 'required|max:3000'
        ]);

        if ($request->file('gambar')) {
            $file = $request->file('gambar');

            $renameFile = uniqid() . '_' . $file->getClientOriginalName();
            $validated['gambar'] = $renameFile;

            $folderLocation = 'berkas';
            File::delete('berkas/' . $beritum->gambar);

            $file->move($folderLocation, $renameFile);
        }

        Berita::find($beritum->id)->update($validated);

        return redirect('berita')->with('success', 'Berita berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        File::delete('berkas/' . $beritum->gambar);

        Berita::find($beritum->id)->delete();

        return redirect('berita')->with('success', 'Berita berhasil dihapus!');
    }

    public function lihatBerita(Berita $beritum)
    {
        return view('gues.showberita', [
            'berita' => $beritum
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'pendaftaran' => Pendaftaran::all()->count(),
            'anggota' => Anggota::all()->count(),
            'kegiatan' => Kegiatan::all()->count(),
            'berita' => Berita::all()->count(),

        ]);
    }
}
