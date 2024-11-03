<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.anggota.index', [
            'anggotas' => Anggota::latest()->get()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggotum)
    {

        return view('admin.anggota.edit', [
            'anggota' => $anggotum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggotum)
    {
        $rules = [
            'nama_lengkap' => 'required|max:100',
            'semester' => 'required|numeric',
            'kelas' => 'required',
            'file_ktm' => 'max:1200',
            'password' => 'required|max:10|min:8'
        ];

        if ($request->email != $anggotum->email) {
            $rules['email'] = 'required|max:50|email|unique:anggotas';
        }

        if ($request->nim != $anggotum->nim) {
            $rules['nim'] = 'required|unique:anggotas';
        }

        if ($request->no_wa != $anggotum->no_wa) {
            $rules['no_wa'] = 'required|unique:anggotas';
        }

        $validated = $request->validate($rules);

        if ($request->file('file_ktm')) {
            $fileKtm = $request->file('file_ktm');

            $rename = uniqid() . '_' . $fileKtm->getClientOriginalName();

            $validated['file_ktm'] = $rename;

            File::delete('berkas_anggota/' . $anggotum->file_ktm);
            $fileKtm->move('berkas_anggota', $rename);
        }

        $validated['password'] = bcrypt($request->password);

        $anggotum->update($validated);

        return redirect('anggota')->with('success', 'Berhasil memperbarui data!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggotum)
    {
        File::delete('berkas_anggota/' . $anggotum->file_ktm);
        $anggotum->delete();

        return back()->with('success', 'Data anggota berhasil dihapus!');
    }

    public function passwordAdmin()
    {
        return view('admin.ubahpassword');
    }

    public function ubahPwAdmin(Request $request)
    {
        $user = User::find(1);
        $password = bcrypt($request->password);

        $user->password = $password;
        $user->save();

        return back()->with('success', 'Password admin berhasil di rubah!');
    }
}
