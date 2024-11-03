<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pendaftaran.index', [
            'pendaftarans' => Pendaftaran::where('status', 'diproses')
                ->orWhere('status', 'tidak_memenuhi_syarat')
                ->latest()->get()
        ]);
    }

    public function screening()
    {
        return view('admin.pendaftaran.index', [
            'pendaftarans' => Pendaftaran::where('status', 'lolos_screening')
                ->orWhere('status', 'diterima')
                ->orWhere('status', 'ditolak')
                ->latest()->get()
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

        $validated = $request->validate([
            'nama_lengkap' => 'required|max:150',
            'email' => 'required|max:50|email|unique:pendaftarans|unique:anggotas',
            'nim' => 'required|numeric|unique:pendaftarans|unique:anggotas',
            'no_wa' => 'required|numeric|unique:pendaftarans|unique:anggotas',
            'semester' => 'required|numeric|max:15',
            'kelas' => 'required|max:1|regex:/^[a-zA-Z]+$/u',
            'file_ukt' => 'required|max:1000',
            'file_ktm' => 'required|max:1000',
            'file_cv' => 'required|max:1000',
            'file_srt_penyataan' => 'required|max:1000',
            'file_ss_instagram' => 'required|max:1000',
        ]);

        $validated['tahun'] = date('Y');

        $fileUkt = $request->file('file_ukt');
        $fileKtm = $request->file('file_ktm');
        $fileCv = $request->file('file_cv');
        $fileSrtPernyataan = $request->file('file_srt_penyataan');
        $fileSsIg = $request->file('file_ss_instagram');

        $renameUkt = uniqid() . '_' . $fileUkt->getClientOriginalName();
        $renameKtm = uniqid() . '_' . $fileKtm->getClientOriginalName();
        $renameCv = uniqid() . '_' . $fileCv->getClientOriginalName();
        $renameSrtPernyataan = uniqid() . '_' . $fileSrtPernyataan->getClientOriginalName();
        $renameSsIg = uniqid() . '_' . $fileSsIg->getClientOriginalName();

        $validated['file_ukt'] = $renameUkt;
        $validated['file_ktm'] = $renameKtm;
        $validated['file_cv'] = $renameCv;
        $validated['file_srt_penyataan'] = $renameSrtPernyataan;
        $validated['file_ss_instagram'] = $renameSsIg;

        $tempatBerkas = 'berkas_anggota';

        $fileUkt->move($tempatBerkas, $renameUkt);
        $fileKtm->move($tempatBerkas, $renameKtm);
        $fileCv->move($tempatBerkas, $renameCv);
        $fileSrtPernyataan->move($tempatBerkas, $renameSrtPernyataan);
        $fileSsIg->move($tempatBerkas, $renameSsIg);

        Pendaftaran::create($validated);

        return back()->with('success', 'Pendaftaran berhasil dilakukan, silahkan tunggu beberapa waktu untuk mendapatkan balasan dari Admin.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.edit', [
            'pendaftaran' => $pendaftaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $rules = [
            'nama_lengkap' => 'required|max:150',
            'semester' => 'required|numeric|max:15',
            'kelas' => 'required|max:1|regex:/^[a-zA-Z]+$/u',
            'file_ukt' => 'max:1000',
            'file_ktm' => 'max:1000',
            'file_cv' => 'max:1000',
            'file_srt_penyataan' => 'max:1000',
            'file_ss_instagram' => 'max:1000',
        ];

        if ($request->email != $pendaftaran->email) {

            $rules['email'] = 'required|max:50|email|unique:pendaftarans|unique:anggotas';
        }
        if ($request->nim != $pendaftaran->nim) {

            $rules['nim'] = 'required|max:50|unique:pendaftarans|unique:anggotas';
        }
        if ($request->no_wa != $pendaftaran->no_wa) {

            $rules['no_wa'] = 'required|max:50|unique:pendaftarans|unique:anggotas';
        }

        $validated = $request->validate($rules);

        $location = 'berkas_anggota';
        if ($fileUkt = $request->file('file_ukt')) {
            $renameFileUkt = uniqid() . '_' . $fileUkt->getClientOriginalName();

            $validated['file_ukt'] = $renameFileUkt;

            File::delete($location . '/' . $pendaftaran->file_ukt);
            $fileUkt->move($location, $renameFileUkt);
        }

        if ($fileKTM = $request->file('file_ktm')) {
            $renameFileKtm = uniqid() . '_' . $fileKTM->getClientOriginalName();

            $validated['file_ktm'] = $renameFileKtm;

            File::delete($location . '/' . $pendaftaran->file_ktm);
            $fileKTM->move($location, $renameFileKtm);
        }

        if ($fileCV = $request->file('file_cv')) {
            $renamefileCV = uniqid() . '_' . $fileCV->getClientOriginalName();

            $validated['file_cv'] = $renamefileCV;

            File::delete($location . '/' . $pendaftaran->file_cv);
            $fileCV->move($location, $renamefileCV);
        }

        if ($filePernyataan = $request->file('file_srt_penyataan')) {
            $renamefilePernyataan = uniqid() . '_' . $filePernyataan->getClientOriginalName();

            $validated['file_srt_penyataan'] = $renamefilePernyataan;

            File::delete($location . '/' . $pendaftaran->file_srt_penyataan);
            $filePernyataan->move($location, $renamefilePernyataan);
        }

        if ($fileIG = $request->file('file_ss_instagram')) {
            $renamefileIG = uniqid() . '_' . $fileIG->getClientOriginalName();

            $validated['file_ss_instagram'] = $renamefileIG;

            File::delete($location . '/' . $pendaftaran->file_ss_instagram);
            $fileIG->move($location, $renamefileIG);
        }

        $pendaftaran->update($validated);

        return redirect('pendaftaran')->with('success', 'Data pendaftaran berhasil di perbarui!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        // Hapus Data + Gambar :
        File::delete('berkas_anggota/' . $pendaftaran->file_ukt);
        File::delete('berkas_anggota/' . $pendaftaran->file_cv);
        File::delete('berkas_anggota/' . $pendaftaran->file_ktm);
        File::delete('berkas_anggota/' . $pendaftaran->file_srt_penyataan);
        File::delete('berkas_anggota/' . $pendaftaran->file_ss_instagram);

        $pendaftaran->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function lolos_berkas(Request $request, Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'lolos_screening';
        $pendaftaran->save();

        $pesan = $request->pesan;
        $no = $pendaftaran->no_wa;

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $no,
                    'message' => $pesan,
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: 4-E_!DH-PoPo#H1_snd3' //change TOKEN to your actual token
                ),
            )
        );

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        echo $response;

        return back()->with('success', 'Berhasil mengirim notif ke calon HMP-SI.');

    }
    public function tidak_lolos_berkas(Request $request, Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'tidak_memenuhi_syarat';
        $pendaftaran->save();

        $pesan = $request->pesan;
        $no = $pendaftaran->no_wa;

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $no,
                    'message' => $pesan,
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: 4-E_!DH-PoPo#H1_snd3' //change TOKEN to your actual token
                ),
            )
        );

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        echo $response;

        return back()->with('success', 'Berhasil mengirim notif tidak memenuhi syarat ke calon HMP-SI.');

    }
    public function ditolak(Request $request, Pendaftaran $pendaftaran)
    {
        $pendaftaran->status = 'ditolak';
        $pendaftaran->save();

        $pesan = $request->pesan;
        $no = $pendaftaran->no_wa;

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $no,
                    'message' => $pesan,
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: 4-E_!DH-PoPo#H1_snd3' //change TOKEN to your actual token
                ),
            )
        );

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        echo $response;

        return back()->with('success', 'Berhasil mengirim notif ditolak ke calon HMP-SI.');

    }

    public function diterima(Request $request, Pendaftaran $pendaftaran)
    {
        // Pindahkan data pendaftaran ke Anggota, lalu hapus data pendaftaran : 


        DB::beginTransaction();
        try {
            Anggota::create([
                'nama_lengkap' => $pendaftaran->nama_lengkap,
                'email' => $pendaftaran->email,
                'nim' => $pendaftaran->nim,
                'no_wa' => $pendaftaran->no_wa,
                'tahun' => $pendaftaran->tahun,
                'semester' => $pendaftaran->semester,
                'kelas' => $pendaftaran->kelas,
                'file_ktm' => $pendaftaran->file_ktm,
                'password' => bcrypt('password')

            ]);

            $pendaftaran->delete();

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', $e->getMessage());

        }

        $pesan = $request->pesan;
        $no = $pendaftaran->no_wa;

        // Hapus Data + Gambar :
        File::delete('berkas_anggota/' . $pendaftaran->file_ukt);
        File::delete('berkas_anggota/' . $pendaftaran->file_cv);
        File::delete('berkas_anggota/' . $pendaftaran->file_srt_penyataan);
        File::delete('berkas_anggota/' . $pendaftaran->file_ss_instagram);


        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $no,
                    'message' => $pesan,
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: 4-E_!DH-PoPo#H1_snd3' //change TOKEN to your actual token
                ),
            )
        );

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
        echo $response;

        return back()->with('success', 'Berhasil mengirim notif diterima ke calon HMP-SI.');

    }

}
