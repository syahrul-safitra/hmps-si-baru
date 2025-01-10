<?php

namespace App\Http\Controllers;

use App\Models\DialogProdi;
use Illuminate\Http\Request;

class DialogProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dialog.index', [
            'dialogs' => DialogProdi::latest()->paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $nama = $request->nama;
        $pesan = $request->pesan;
        $angkatan = $request->angkatan;

        DialogProdi::create(["nama" => $nama, "pesan" => $pesan, 'angkatan' => $angkatan]);

        return back()->with('success', 'Berhasil mengirim dialog prodi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DialogProdi $dialogprodi)
    {
        $dialogprodi->delete();
        return back()->with('success', 'Dialog berhasil dihapus!');
    }

    public function change_status_dialog(Request $request, DialogProdi $dialog)
    {
        $dialog->status = $request->status;
        $dialog->save();
        return back()->with('success', 'Berhasil merubah status dialog!');
    }

    public function selengkapnya()
    {
        return view('gues.dialogSelengkapnya', [
            'dialogs' => DialogProdi::latest()->paginate(50)
        ]);
    }
}
