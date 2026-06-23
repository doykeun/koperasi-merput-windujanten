<?php

namespace App\Http\Controllers;

use App\Models\ProfilKoperasi;
use Illuminate\Http\Request;

class ProfilKoperasiController extends Controller
{
    public function index()
    {
        $profil = ProfilKoperasi::first();
        
        if (request()->is('kopmerput-admin/*')) {
            return view('admin.profil.index', compact('profil'));
        }
        
        return view('profil.index', compact('profil'));
    }

    public function create()
    {
        $profil = ProfilKoperasi::first();
        if ($profil) {
            return redirect()->route('admin.profil.edit', $profil->id);
        }
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_koperasi' => 'required',
            'nik' => 'required',
            'nib' => 'required',
            'npwp' => 'required',
            'jenis_koperasi' => 'required',
        ]);

        ProfilKoperasi::create($request->all());

        return redirect()->route('admin.profil.index')->with('success', 'Profil koperasi berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $profil = ProfilKoperasi::findOrFail($id);
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, string $id)
    {
        $profil = ProfilKoperasi::findOrFail($id);

        $request->validate([
            'nama_koperasi' => 'required',
            'nik' => 'required',
            'nib' => 'required',
            'npwp' => 'required',
            'jenis_koperasi' => 'required',
        ]);

        $profil->update($request->all());

        return redirect()->route('admin.profil.index')->with('success', 'Profil koperasi berhasil diupdate');
    }
}
