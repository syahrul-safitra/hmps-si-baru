<?php

namespace App\Http\Controllers;

use App\Models\PromosiKegiatan;
use App\Models\PartisiPromosiKegiatan;

use Illuminate\Http\Request;

class PartisipasiKegiatanPromosiController extends Controller
{
    public function index()
    {
        return 'index';
    }

    public function daftar(PromosiKegiatan $promokegiatan)
    {

        return view('gues.form_partisipasi', [
            'data' => $promokegiatan
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nim' => 'required|max:15|min:8',
            'nama' => 'required|max:50',
            'semester' => 'required|max:2',
            'kelas' => 'required|max:1',
            'no_wa' => 'required|max:15',
            'promosi_kegiatan_id' => 'required'
        ]);

        $validated['kode'] = uniqid();

        try {
            PartisiPromosiKegiatan::create($validated);
        } catch (\Exception $e) {
            return back()->with('error', "Nim sudah terdaftar pada kegiatan ini");
        }

        return back()->with('success', "Success");
    }
}
