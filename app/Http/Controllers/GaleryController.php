<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Galery;

class GaleryController extends Controller
{
    public function index()
    {
        return view('admin.editgalery', [
            'galery' => Galery::find(1)
        ]);
    }

    public function update(Request $request)
    {

        $data = Galery::first();

        $validated = $request->validate([
            'banner1' => 'max:1200|image',
            'banner2' => 'max:1200|image',
            'banner3' => 'max:1200|image',
            'profile' => 'max:1200|image',
            'struktur' => 'max:1200|image'
        ]);

        if ($request->file('banner1')) {
            $fileBanner1 = $request->file('banner1');

            $rename = uniqid() . '_' . $fileBanner1->getClientOriginalName();

            $validated['banner1'] = $rename;

            File::delete('img/' . $data->banner1);

            $fileBanner1->move('img', $rename);
        }

        if ($request->file('banner2')) {
            $fileBanner2 = $request->file('banner2');

            $rename2 = uniqid() . '_' . $fileBanner2->getClientOriginalName();

            $validated['banner2'] = $rename2;

            File::delete('img/' . $data->banner2);

            $fileBanner2->move('img', $rename2);
        }

        if ($request->file('banner3')) {
            $fileBanner3 = $request->file('banner3');

            $rename3 = uniqid() . '_' . $fileBanner3->getClientOriginalName();

            $validated['banner3'] = $rename3;

            File::delete('img/' . $data->banner3);


            $fileBanner3->move('img', $rename3);
        }

        if ($request->file('profile')) {
            $fileprofile = $request->file('profile');

            $rename4 = uniqid() . '_' . $fileprofile->getClientOriginalName();

            $validated['profile'] = $rename4;

            File::delete('img/' . $data->profile);


            $fileprofile->move('img', $rename4);
        }

        if ($request->file('struktur')) {
            $filestruktur = $request->file('struktur');

            $rename5 = uniqid() . '_' . $filestruktur->getClientOriginalName();

            $validated['struktur'] = $rename5;

            File::delete('img/' . $data->struktur);


            $filestruktur->move('img', $rename5);
        }

        $data->update($validated);

        return back()->with('success', 'Berhasil mengubah gambar!');
    }
}
