<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pengurus.index', [
            'pengurus' => User::where('role', 'pengurus')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:20|min:3',
            'email' => 'required|unique:users|max:20|min:5',
            'password' => 'required|max:10|min:5'
        ]);

        User::create($validated);

        return redirect('pengurus')->with('success', 'Berhasil menambahkan pengurus!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $penguru)
    {
        return view('admin.pengurus.edit', [
            'data' => $penguru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $penguru)
    {
        $rules = [
            'name' => 'required|max:20|min:3',
            'password' => 'required|max:10|min:5'
        ];

        if ($request->email != $penguru->email) {
            $rules['email'] = 'required|unique:users|max:20|min:5';
        }

        $validated = $request->validate($rules);

        $penguru->update($validated);

        return redirect('pengurus')->with('success', 'Berhasil mengedit data pengurus!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $penguru)
    {
        $penguru->delete();

        return redirect('pengurus')->with('success', 'Berhasil menghapus data pengurus!');
    }
}
